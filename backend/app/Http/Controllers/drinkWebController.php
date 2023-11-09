<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\drink;

class drinkWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinks = drink::all();
        return view("drinks.index", ["drinks" => $drinks]);
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
        $drink = new drink();
        $drink -> name = $request -> name;
        $drink -> description = $request -> description;
        $drink -> price = $request -> price;
        $drink -> stock = $request -> stock;
        $drink -> save();
        return redirect()->route('drinks.index')->with('success', 'bebida creada exitosamente!');
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
        $drink = drink::find($id);
        return view("drinks.edit", ["drink" => $drink]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drink = drink::find($id);
        $drink -> name = $request -> name;
        $drink -> description = $request -> description;
        $drink -> price = $request -> price;
        $drink -> stock = $request -> stock;
        $drink -> save();
        return redirect()->route('drinks.index')->with('success', 'bebida actualizada exitosamente!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drink = drink::find($id);
        $drink -> delete();
        return redirect()->route('drinks.index')->with('success', 'bebida eliminadaexitosamente!');
    }
}