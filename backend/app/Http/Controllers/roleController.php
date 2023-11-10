<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\role;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = role::all();
        return view("role.index", ["roles" => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new role();
        $role -> name = $request -> name;
        $role -> save();
        return redirect()->route('role.index')->with('success', 'Role creado exitosamente!');
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
        $role = role::find($id);
        return view("role.edit", ["role" => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = role::find($id);
        $role -> name = $request -> name;
        $role -> save();
        return redirect()->route('role.index')->with('success', 'Role actualizado exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = role::find($id);
        $role -> delete();
        return redirect()->route('role.index')->with('success', 'Role eliminado exitosamente!');
 
    }
}
