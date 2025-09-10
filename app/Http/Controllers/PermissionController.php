<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = $request->role??"Super Admin";
        $role = Role::findByName($role, 'web');
        $permission = $role->permissions->pluck('name')->toArray();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permission.index', compact('roles', 'permissions', 'role', 'permission', 'request'));
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
        $request->validate([
            'name'  => 'required|regex:/^[A-Za-z\s]+$/|max:20',
            'guard_name' => 'required|regex:/^[A-Za-z]+$/|max:10',
        ]);
        $permission = new Permission($request->all());
        $permission->save();
        return redirect()->route('permission.index')->with('success', 'Permission Added successfully');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|regex:/^[A-Za-z\s]+$/|max:20',
            'guard_name' => 'required|regex:/^[A-Za-z]+$/|max:10',
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->update();
        return redirect()->route('permission.index')->with('success', 'Permission Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->back()->with('success', 'Permission Deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permissionToRoll(Request $request)
    {
        $role = Role::findByName($request->role, 'web');
        $role->syncPermissions($request->permission);
        return redirect()->route('permission.index')->with('success', 'Permissions updated successfully');
    }
}
