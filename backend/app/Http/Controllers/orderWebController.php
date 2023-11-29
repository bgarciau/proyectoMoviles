<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;
use App\Models\User;
use App\Models\plate;
use App\Models\drink;

class orderWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = order::all();
        $meseros = User::where('role_id',1 )->get();
        $clientes = User::where('role_id',2 )->get();
        $plates = plate::all();
        $drinks = drink::all();
        return view("orders.index", ["orders" => $orders,"meseros" => $meseros,"clientes" => $clientes,"plates" => $plates,"drinks" => $drinks]);
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
        $order = new order;
        $order->waiter_id = $request->waiter_id;
        $order->user_id = $request->user_id;
        $order->table = $request->table;
        $order->plate_id = $request->plate_id;
        $order->drink_id = $request->drink_id;
        $order->total = $request->total;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente!');
    
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
        $order = order::find($id);
        $meseros = User::where('role_id',1 )->get();
        $clientes = User::where('role_id',2 )->get();
        $plates = plate::all();
        $drinks = drink::all();
        return view("orders.edit", ["order" => $order,"meseros" => $meseros,"clientes" => $clientes,"plates" => $plates,"drinks" => $drinks]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = order::find($id);
        $order->waiter_id = $request->waiter_id;
        $order->user_id = $request->user_id;
        $order->table = $request->table;
        $order->plate_id = $request->plate_id;
        $order->drink_id = $request->drink_id;
        $order->total = $request->total;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Orden actualizada exitosamente!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = order::find($id);
        $order -> delete();
        return redirect()->route('orders.index')->with('success', 'Orden eliminada exitosamente!');
    }
}
