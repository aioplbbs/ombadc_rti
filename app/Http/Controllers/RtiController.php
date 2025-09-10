<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rti;

class RtiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rti = Rti::paginate(20);
        return view('rti.index', compact('rti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rti.create');
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
        $data = [];
        $rti = new Rti($data);
        $rti->save();
        return redirect()->route('rti.index')->with('success', 'RTI Applied successfully');
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
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->update();
        return redirect()->back()->with('success', 'Role Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role Deleted successfully');
    }
}
