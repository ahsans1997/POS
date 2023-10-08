<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users-list|users-create|users-edit|users-delete|assign-permission-to-role', ['except' => ['index']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('role','UserDetails')->get();
        return view('users.index',[
            'users' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|confirmed|min:8',
            'mobile_number' => 'required',
            'user_status' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $user_detils = new UserDetails();
            $user_detils->user_id = $user->id;
            $user_detils->address = $request->address;
            $user_detils->message = $request->message;
            $user_detils->mobile_number = $request->mobile_number;
            $user_detils->created_by = auth()->user()->id;
            $user_detils->user_status = $request->user_status;
            $user_detils->save();
            DB::commit();
            Toastr::success('User added successfully');
            return redirect()->route('users.index');
        }
        catch (Exception $e) {
            DB::rollBack();
            Toastr::error('Something went wrong! Please try again',);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->with('UserDetails')->first();
        return view('users.edit',[
            'user_info' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required|numeric',
            'user_status' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $user_detils = UserDetails::where('user_id', $user->id)->firstOrCreate();
            $user_detils->user_id = $user->id;
            $user_detils->address = $request->address;
            $user_detils->message = $request->message;
            $user_detils->mobile_number = $request->mobile_number;
            $user_detils->edited_by = auth()->user()->id;
            $user_detils->user_status = $request->user_status;
            $user_detils->save();
            DB::commit();
            Toastr::success('User Edit Successfully');
            return back();
        }
        catch (Exception $e) {
            DB::rollBack();
            Toastr::error('User Not Create');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try{
            $user = User::find($id);
            $user->delete();

            $userDetails = UserDetails::where('user_id', $id)->first();
            $userDetails->delete();

            DB::commit();
            Toastr::success('User Deleted successfully');
            return back();
        }
        catch (Exception $e) {
            DB::rollBack();
            Toastr::error('User Not Deleted');
            return back();
        }
    }

    public function assignRole(string $id)
    {
        $user = User::find($id);
        $userRole = $user->role;
        return view('users.assignroles',[
            'user' => $user,
            'roles' => Role::all(),
            'userRoles' => $userRole,
        ]);
    }

    public function assignRoleToUser(Request $request, $id){

        DB::beginTransaction();

        try{

            $user = User::find($id);
            $userDetails = UserDetails::where('user_id', $id)->first();
            $userDetails->edited_by = auth()->user()->id;
            $userDetails->save();

            $roles = $request->roles;
            $user->syncRoles($roles);

            DB::commit();

            Toastr::success('Assign Role to User');
            return redirect()->route('users.index');
        }
        catch (Exception $e) {
            DB::rollBack();
            Toastr::error('Not Assign Role to User');
            return back();
        }

    }

}
