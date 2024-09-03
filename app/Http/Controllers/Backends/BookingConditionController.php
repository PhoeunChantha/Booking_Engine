<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Models\BookingCondition;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingConditionController extends Controller
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
        $bookingcondition = BookingCondition::where('hotel_id', $current_hotel_id)->first();

        return view('backends.bookingcondition.index', compact('bookingcondition'));
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
        $request->validate([
            'deposit_type' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            if ($request->has('id')) {
                $bookingcondition = BookingCondition::findOrFail($request->id);
                $msg = __('Bookingcondition updated successfully.');
            } else {
                $bookingcondition = new BookingCondition();
                $msg = __('Bookingcondition created successfully.');
            }

            $bookingcondition->deposit_type = $request->input('deposit_type');
            $bookingcondition->hotel_id = session()->get('current_hotel_id');
            $bookingcondition->deposit_value = $request->input('deposit_value');
            $bookingcondition->balance_due = $request->input('balance_due');
            $bookingcondition->policies = $request->input('policies');
            
            $bookingcondition->save();

            DB::commit();

            $output = [
                'success' => 1,
                'msg' => $msg,
            ];

        } catch (Exception $e) {
            DB::rollBack();

            $output = [
                'success' => 0,
                'msg' => __('Something went wrong. Please try again.'),
            ];

            // Optional: Log the exception or show a detailed error for debugging
            // Log::error($e->getMessage());
            // dd($e);
        }

        return redirect()->route('admin.bookingcondition.index')->with($output);
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
