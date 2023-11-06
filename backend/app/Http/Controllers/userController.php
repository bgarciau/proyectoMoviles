<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\role;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('visible', true)->get();
        $roles = role::all();
        return json_encode(["users" => $users, "roles" => $roles]);
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
        return json_encode(["success" => true, "message" => "Usuario creado exitosamente!"]);
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
        //
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
        return json_encode(["success" => true, "message" => "Usuario actualizado exitosamente!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user -> visible = false;
        $user -> save();
        return json_encode(["success" => true, "message" => "Usuario eliminado exitosamente!"]);
    }
}
