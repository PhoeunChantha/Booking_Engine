<?php

namespace App\Http\Controllers\Backends;

use Exception;
use Illuminate\Http\Request;
use App\helpers\ImageManager;
use App\Models\Accommodation;
use App\Models\HomeStayAmenity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post') || $request->isMethod('put')) {
        }

        $current_hotel_id = session()->get('current_hotel_id');
        $accommodation = Accommodation::where('hotel_id', $current_hotel_id)->first();

        $amenities = HomeStayAmenity::find(6);
        $amenities = collect($amenities->value)->pluck('title');

        return view('backends.accommodation.index', compact('accommodation', 'amenities'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'description' => 'required|string',
            // 'featured_image' => 'nullable|image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            if ($request->has('id')) {
                $accommodation = Accommodation::findOrFail($request->id);
                $msg = __('Accommodation updated successfully.');
            } else {
                $accommodation = new Accommodation();
                $msg = __('Accommodation created successfully.');
            }

            $accommodation->description = $request->input('description');
            $accommodation->hotel_id = session()->get('current_hotel_id');
            $accommodation->amenities = $request->input('amenities', []);
            $accommodation->latitude = $request->input('latitude');
            $accommodation->longitude = $request->input('longitude');

            if ($request->hasFile('featured_image')) {
                $accommodation->featured_image = ImageManager::update(
                    'uploads/accommodations/',
                    $accommodation->featured_image ?? null,
                    $request->file('featured_image')
                );
            }

            if ($request->hasFile('banner')) {
                $accommodation->banner = ImageManager::update(
                    'uploads/accommodations/',
                    $accommodation->banner ?? null,
                    $request->file('banner')
                );
            }

            if ($request->hasFile('banner_mobile')) {
                $accommodation->banner_mobile = ImageManager::update(
                    'uploads/accommodations/',
                    $accommodation->banner_mobile ?? null,
                    $request->file('banner_mobile')
                );
            }

            if ($request->hasFile('logo_voucher')) {
                $accommodation->logo_voucher = ImageManager::update(
                    'uploads/accommodations/',
                    $accommodation->logo_voucher ?? null,
                    $request->file('logo_voucher')
                );
            }

            if ($request->hasFile('map_image')) {
                $accommodation->map_image = ImageManager::update(
                    'uploads/accommodations/',
                    $accommodation->map_image ?? null,
                    $request->file('map_image')
                );
            }

            $accommodation->save();
            DB::commit();

            $output = [
                'success' => 1,
                'msg' => $msg,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            dd($e);
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong. Please try again.'),
            ];

            // Optional: Log the exception or show a detailed error for debugging

        }

        return redirect()->route('admin.accommodation.index')->with($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
