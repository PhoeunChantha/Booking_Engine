<?php

namespace App\Http\Controllers\Backends;

use App\helpers\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\HotelManagement;
use App\Models\Translation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HotelManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('hotelmanagement.view')) {
            abort(403, 'Unauthorized action.');
        }
        $hotel_managements = HotelManagement::latest('id')->paginate(10);
        return view('backends.hotel-management.index', compact('hotel_managements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('hotelmanagement.create')) {
            abort(403, 'Unauthorized action.');
        }
        $language = BusinessSetting::where('type', 'language')->first();
        $language = $language->value ?? null;
        $default_lang = 'en';
        $default_lang = json_decode($language, true)[0]['code'];

        if (request()->ajax()) {
            $lang = request('lang');
            $key = request('key');
        }

        return view('backends.hotel-management.create', compact('language', 'default_lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('hotelmanagement.create')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if (is_null($request->title[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Title', 'The title field is required!'
                );
            });
        }
        if (is_null($request->description[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Description', 'The description field is required!'
                );
            });
        }

        try {
        // dd($request->all());
            DB::beginTransaction();
            $hotel_management = new HotelManagement();
            $hotel_management->title = $request->title[array_search('en', $request->lang)];
            $hotel_management->description = $request->description[array_search('en', $request->lang)];
            if ($request->hasFile('image')) {
                $hotel_management->image = ImageManager::upload('uploads/hotel_management',$request->image);
            }
            $hotel_management->save();

            $data = [];
            foreach ($request->lang as $index => $key) {
                if ($request->title[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\HotelManagement',
                        'translationable_id' => $hotel_management->id,
                        'locale' => $key,
                        'key' => 'title',
                        'value' => $request->title[$index],
                    ));
                }

                if ($request->description[$index] && $key != 'en') {
                    array_push($data, array(
                        'translationable_type' => 'App\Models\HotelManagement',
                        'translationable_id' => $hotel_management->id,
                        'locale' => $key,
                        'key' => 'description',
                        'value' => $request->description[$index],
                    ));
                }

            }
            Translation::insert($data);

            DB::commit();
            $table = $this->renderTable();
            $view = $table['view'];

            $output = [
                'success' => 1,
                'msg' => __('Create successfully'),
                'view' => $view,
            ];

        } catch (Exception $e) {
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong'),
            ];
        }

        return redirect()->route('admin.hotel_management.index')->with($output);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('hotelmanagement.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $language = BusinessSetting::where('type', 'language')->first();
        $language = $language->value ?? null;
        $default_lang = 'en';
        $default_lang = json_decode($language, true)[0]['code'];

        if (request()->ajax()) {
            $lang = request('lang');
            $key = request('key');
        }

        $hotel_management = HotelManagement::withoutGlobalScopes()->with('translations')->findOrFail($id);
        return view('backends.hotel-management.edit', compact('hotel_management', 'language', 'default_lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('hotelmanagement.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if (is_null($request->title[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Title', 'The title field is required!'
                );
            });
        }
        if (is_null($request->description[array_search('en', $request->lang)])) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'Description', 'The description field is required!'
                );
            });
        }
        try{
            // dd($request->all());
        DB::beginTransaction();
            $hotel_management = HotelManagement::findOrFail($id);
            $hotel_management->title = $request->title[array_search('en', $request->lang)];
            $hotel_management->description = $request->description[array_search('en', $request->lang)];
            if ($request->hasFile('image')) {
                $hotel_management->image = ImageManager::update('uploads/hotel_management/', $hotel_management->image, $request->image);
            }
            $hotel_management->save();

            $data = [];
            foreach ($request->lang as $index => $key) {
                if ($request->title[$index] && $key != 'en') {
                    Translation::updateOrInsert(
                        ['translationable_type' => 'App\Models\HotelManagement',
                            'translationable_id' => $hotel_management->id,
                            'locale' => $key,
                            'key' => 'title'],
                        ['value' => $request->title[$index]]
                    );
                }

                if ($request->description[$index] && $key != 'en') {
                    Translation::updateOrInsert(
                        ['translationable_type' => 'App\Models\HotelManagement',
                            'translationable_id' => $hotel_management->id,
                            'locale' => $key,
                            'key' => 'description'],
                        ['value' => $request->description[$index]]
                    );
                }

            }
            Translation::insert($data);

            DB::commit();
            $table = $this->renderTable();
            $view = $table['view'];

            $output = [
                'success' => 1,
                'msg' => __('Edited successfully'),
                'view' => $view,
            ];

        }catch(Exception $e){
            dd($e);
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong'),
            ];
        }
        return redirect()->route('admin.hotel_management.index')->with($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('hotelmanagement.delete')) {
            abort(403, 'Unauthorized action.');
        }
        try {
            DB::beginTransaction();
            $hotel_management = HotelManagement::findOrFail($id);
            $hotel_management->delete();

            if ($hotel_management->image) {
                ImageManager::delete(public_path('uploads/hotel_management/' . $hotel_management->image));
            }

            $table = $this->renderTable();
            $view = $table['view'];

            DB::commit();
            $output = [
                'status' => 1,
                'view' => $view,
                'msg' => __('Deleted successfully')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            $output = [
                'status' => 0,
                'msg' => __('Something went wrong')
            ];
        }

        return response()->json($output);
    }

    public function updateStatus (Request $request)
    {
        try {
            DB::beginTransaction();

            $hotel_management = HotelManagement::findOrFail($request->id);
            $hotel_management->status = $hotel_management->status == 'active' ? 'inactive' : 'active';
            $hotel_management->save();

            $output = ['status' => 1, 'msg' => __('Status updated')];

            DB::commit();
        } catch (Exception $e) {
            $output = ['status' => 0, 'msg' => __('Something went wrong')];
            DB::rollBack();
        }

        return response()->json($output);
    }

    public function renderTable()
    {
        $hotel_managements = HotelManagement::latest('id')->paginate(10);
        $view = view('backends.hotel-management._table', compact('hotel_managements'))->render();

        return ['view' => $view];
    }
}
