<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkPermission();
        return view('permission.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkPermission();
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create(['name' => $request->name]);
        return redirect()->back()->with('success', 'Permission Created Successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkPermission();
        Permission::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Permission Deleted Successfully');
        //
    }
}
