<?php

namespace App\Http\Controllers\Backends;

use Exception;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\helpers\ImageManager;
use App\helpers\GlobalFunction;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('comment.view')) {
            abort(403, 'Unauthorized action.');
        }
        $comments = Comment::whereNull('parent_id')->latest('id')->paginate(10);
        GlobalFunction::seenNotification('App\Models\Comment');
        return view('backends.comment.index', compact('comments'));
    }
    public function create()
    {
        $language = BusinessSetting::where('type', 'language')->first();
        $language = $language->value ?? null;
        $default_lang = 'en';
        $default_lang = json_decode($language, true)[0]['code'];
        return view('backends.comment.create', compact('language', 'default_lang'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if (is_null($request->name[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Name',
                    'The name field is required!'
                );
            });
        }
        if (is_null($request->description[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Description',
                    'The description field is required!'
                );
            });
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['success' => 0, 'msg' => __('Invalid form input')]);
        }
        try {
            // dd($request->all());

            DB::beginTransaction();
            $comment = new Comment();
            $comment->customer_name        = $request->name[array_search('en', $request->lang)];
            $comment->content        = $request->description[array_search('en', $request->lang)];
            $comment->admin_id = auth()->user()->id;
            $comment->save();
            $data = [];
            foreach ($request->lang as $index => $key) {
                if ($request->name[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\Comment',
                        'translationable_id' => $comment->id,
                        'locale' => $key,
                        'key' => 'name',
                        'value' => $request->name[$index],
                    ));
                }
            }
            foreach ($request->lang as $index => $key) {
                if ($request->description[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\Comment',
                        'translationable_id' => $comment->id,
                        'locale' => $key,
                        'key' => 'description',
                        'value' => $request->description[$index],
                    ));
                }
            }
            Translation::insert($data);

            DB::commit();
            $output = [
                'success' => 1,
                'msg' => __('Created successfully')
            ];
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong')
            ];
        }
        return redirect()->route('admin.comment.index')->with($output);
    }
    public function edit($id)
    {
        $comment = Comment::withoutGlobalScopes()->with('translations')->findOrFail($id);
        // dd($comment);
        $language = BusinessSetting::where('type', 'language')->first();
        $language = $language->value ?? null;
        $default_lang = 'en';
        $default_lang = json_decode($language, true)[0]['code'];

        return view('backends.comment.edit', compact('comment', 'language', 'default_lang'));
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if (is_null($request->name[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Name',
                    'The name field is required!'
                );
            });
        }
        if (is_null($request->description[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Description',
                    'The description field is required!'
                );
            });
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(['success' => 0, 'msg' => __('Invalid form input')]);
        }
        try {
            // dd($request->all());
            DB::beginTransaction();
            $comment = Comment::find($id);
            $comment->customer_name = $request->name[array_search('en', $request->lang)];
            $comment->content = $request->description[array_search('en', $request->lang)];
            $comment->admin_id = auth()->user()->id;
            $comment->save();
            $data = [];
            foreach ($request->lang as $index => $key) {
                if ($request->name[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\Comment',
                        'translationable_id' => $comment->id,
                        'locale' => $key,
                        'key' => 'name',
                        'value' => $request->name[$index],
                    ));
                }
            }
            foreach ($request->lang as $index => $key) {
                if ($request->description[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\Comment',
                        'translationable_id' => $comment->id,
                        'locale' => $key,
                        'key' => 'description',
                        'value' => $request->description[$index],
                    ));
                }
            }
            Translation::insert($data);

            DB::commit();
            $output = [
                'success' => 1,
                'msg' => __('Updated successfully')
            ];
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong')
            ];
        }
        return redirect()->route('admin.comment.index')->with($output);
    }
    public function send(Request $request)
    {
        if (!auth()->guard('customer')->check()) {
            $output = [
                'success' => 0,
                'msg' => __('Please login first')
            ];
            return response()->json($output);
        } else {
            try {
                DB::beginTransaction();
                $blog = Blog::find($request->blog_id);
                $comment = new Comment();
                $comment->customer_id = auth()->guard('customer')->user()->id;
                $comment->content = $request->input('content');
                $comment->blog_id = $request->blog_id;
                $comment->type = 'send';
                $comment->save();
                $comments = Comment::where('blog_id', $request->blog_id)->whereNull('parent_id')->get();
                DB::commit();
                GlobalFunction::storeNotification('App\Models\Comment', $comment->id);
                $output = [
                    'success' => 1,
                    'msg' => __('Comment successfully'),
                    'comment' => view('frontends.blog.comment')->with(['comments' => $comments, 'blog' => $blog])->render(),
                ];
            } catch (Exception $e) {
                DB::rollBack();
                $output = [
                    'success' => 0,
                    'msg' => __('Something went wrong'),
                ];
            }
            return response()->json($output);
        }
    }

    public function reply(Request $request, $id)
    {
        if (!auth()->guard('customer')->check()) {
            $output = [
                'success' => 0,
                'msg' => __('Please login first')
            ];
            return response()->json($output);
        } else {
            try {
                DB::beginTransaction();
                $comment = Comment::findorfail($id);
                $reply = new Comment();
                $reply->customer_id = auth()->guard('customer')->user()->id;
                $reply->parent_id = $comment->id;
                $reply->blog_id = $comment->blog_id;
                $reply->content = $request->input('content');
                $reply->type = 'reply';
                $comment->replies()->save($reply);
                DB::commit();
                $output = [
                    'success' => 1,
                    'msg' => __('Reply successfully'),
                    'reply' => view('frontends.blog.reply', ['comment' => $comment])->render(),
                ];
            } catch (Exception $e) {
                dd($e);
                DB::rollBack();
                $output = [
                    'success' => 0,
                    'msg' => __('Something went wrong')
                ];
            }
            return response()->json($output);
        }
    }

    public function show($id)
    {
        if (!auth()->user()->can('comment.create')) {
            abort(403, 'Unauthorized action.');
        }
        $comment = Comment::findorfail($id);
        return view('backends.comment.view', compact('comment'));
    }
    // public function adminReply(Request $request, $id)
    // {
    //     if (!auth()->user()->can('comment.create')) {
    //         abort(403, 'Unauthorized action.');

    //     }
    //     try{
    //         DB::beginTransaction();
    //         $comment = Comment::findorfail($id);
    //         $reply = new Comment();
    //         $reply->admin_id = auth()->user()->id;
    //         $reply->parent_id = $comment->id;
    //         $reply->blog_id = $comment->blog_id;
    //         $reply->content = $request->input('content');
    //         $reply->type = 'reply';
    //         $comment->replies()->save($reply);
    //         DB::commit();

    //         $output = [
    //             'success' => 1,
    //             'msg' => __('Reply successfully')
    //         ];

    //     }catch(Exception $e){
    //         DB::rollBack();
    //         $output = [
    //             'success' => 0,
    //             'msg' => __('Something went wrong'),
    //         ];
    //     }
    //     return redirect()->route('admin.comment.index')->with($output);
    // }
    public function destroy($id)
    {
        if (!auth()->user()->can('comment.delete')) {
            abort(403, 'Unauthorized action.');
        }
        try {
            DB::beginTransaction();
            $comment = Comment::findOrFail($id);
            $comment->delete();
            $comments = Comment::whereNull('parent_id')->latest('id')->paginate(10);
            $view = view('backends.comment._table', compact('comments'))->render();

            DB::commit();
            $output = [
                'status' => 1,
                'view' => $view,
                'msg' => __('Deleted successfully')
            ];
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong'),
            ];
        }
        return response()->json($output);
    }
    public function updateStatus(Request $request)
    {
        try {
            DB::beginTransaction();

            $comment = Comment::findOrFail($request->id);
            $comment->status = $comment->status == 'active' ? 'inactive' : 'active';
            $comment->save();

            $output = ['status' => 1, 'msg' => __('Status updated')];

            DB::commit();
        } catch (Exception $e) {
            $output = ['status' => 0, 'msg' => __('Something went wrong')];
            DB::rollBack();
        }

        return response()->json($output);
    }
}
