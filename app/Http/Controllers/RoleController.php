<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create',[
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = "web";
        $role->save();

        $permissions = $request->permissions;
        $role->syncPermissions($permissions);

        Toastr::success('Role Create Successfully');
        return redirect()->route('roles.index');
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
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions;

        return view('roles.edit',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $permissions = $request->permissions;
        $role->syncPermissions($permissions);

        Toastr::success('Role Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignPermission($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions;

        return view('roles.assignPermission',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function assignPermissionToRole(Request $request ,$id){
        $role = Role::find($id);
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);

        Toastr::success('Assign Permission To Role Successfully');
        return redirect()->route('roles.index');
    }
}
