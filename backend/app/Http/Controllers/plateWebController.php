<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\plate;

class plateWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plates = plate::all();
        return view("plates.index", ["plates" => $plates]);
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
        $plate = new plate();
        $plate -> name = $request -> name;
        $plate -> description = $request -> description;
        $plate -> price = $request -> price;
        $plate -> stock = $request -> stock;
        $plate -> save();
        return redirect()->route('plates.index')->with('success', 'platillo creado exitosamente!');
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
        $plate = plate::find($id);
        return view("plates.edit", ["plate" => $plate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plate = plate::find($id);
        $plate -> name = $request -> name;
        $plate -> description = $request -> description;
        $plate -> price = $request -> price;
        $plate -> stock = $request -> stock;
        $plate -> save();
        return redirect()->route('plates.index')->with('success', 'platillo actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plate = plate::find($id);
        $plate -> delete();
        $plate -> save();
        return json_encode(["success" => true, "message" => "platillo eliminado exitosamente!"]);
    }
}
