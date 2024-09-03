<?php

namespace App\Http\Controllers\Backends;

use Exception;
use Illuminate\Http\Request;
use App\Models\GuestManagement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GuestManagementController extends Controller
{
    public function index(Request $request)
    {
        $guests = GuestManagement::get();

        if ($request->search_key) {
            $guests = GuestManagement::where('first_name', 'like', '%' . $request->search_key . '%')
                ->orWhere('last_name', 'like', '%' . $request->search_key . '%')
                ->orWhere('email', 'like', '%' . $request->search_key . '%')
                ->get();
        }
        if ($request->alphabet) {
            $guests = GuestManagement::where('first_name', 'like', $request->alphabet . '%')->get();
        }
        if ($request->ajax()) {
            return view('backends.guest._table', compact('guests'))->render();
        }

        return view('backends.guest.index', compact('guests'));
    }

    public function create()
    {
        return view('backends.guest._create');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $guest = new GuestManagement();
            $guest->type = $request->type;
            $guest->first_name = $request->first_name;
            $guest->last_name = $request->last_name;
            $guest->phone = $request->phone;
            $guest->email = $request->email;
            $guest->address = $request->address;
            $guest->city = $request->city;
            $guest->country = $request->country;
            $guest->postal_code = $request->postal_code;
            $guest->identification = $request->identification;
            $guest->nationality = $request->nationality;
            $guest->birth_date = $request->birth_date;
            $guest->gender = $request->gender;
            $guest->guest_preferences = $request->guest_preferences;
            $guest->save();
            DB::commit();
            $output = [
                'success' => 1,
                'msg' => __('Created successfully')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong')
            ];
        }
        return redirect()->route('admin.guest_management.index')->with($output);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $guest = GuestManagement::find($id);
        return view('backends.guest._edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $guest = GuestManagement::findOrFail($id);
            $guest->type = $request->type;
            $guest->first_name = $request->first_name;
            $guest->last_name = $request->last_name;
            $guest->phone = $request->phone;
            $guest->email = $request->email;
            $guest->address = $request->address;
            $guest->city = $request->city;
            $guest->country = $request->country;
            $guest->postal_code = $request->postal_code;
            $guest->identification = $request->identification;
            $guest->nationality = $request->nationality;
            $guest->birth_date = $request->birth_date;
            $guest->gender = $request->gender;
            $guest->guest_preferences = $request->guest_preferences;
            $guest->save();
            DB::commit();
            $output = [
                'success' => 1,
                'msg' => __('Updated successfully')
            ];
        } catch (Exception $e) {
            // dd($e);
            DB::rollBack();
            $output = [
                'success' => 0,
                'msg' => __('Something went wrong')
            ];
        }

        return redirect()->route('admin.guest_management.index')->with($output);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $guest = GuestManagement::findOrFail($id);
            $guest->delete();
            $guests = GuestManagement::latest('id')->paginate(10);
            $view = view('backends.guest._table', compact('guests'))->render();

            DB::commit();
            $output = [
                'status' => 1,
                'view'  => $view,
                'msg' => __('User Deleted successfully')
            ];
        } catch (Exception $e) {
            DB::rollBack();

            $output = [
                'status' => 0,
                'msg' => __('Something when wrong')
            ];
        }

        return response()->json($output);
    }
}
