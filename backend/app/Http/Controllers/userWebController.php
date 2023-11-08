<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\role;

class userWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('visible', true)->get();
        $roles = role::all();
        return view("users.index", ["users" => $users, "roles" => $roles]);
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
        $user = new User();
        $user -> name = $request -> name;
        $user -> phone = $request -> phone;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente!');
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
        $user = User::find($id);
        return view("users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user -> name = $request -> name;
        $user -> phone = $request -> phone;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> save();
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user -> visible = false;
        $user -> save();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente!');
    }
}
