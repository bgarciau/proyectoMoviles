<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orders = order::where('clien_id', $id)->get();
        $orders = order::all();
        return json_encode(["orders" => $orders]);
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
        $order->user_id = $request->user_id;
        $order->table = $request->table;
        $order->direccion = $request->direccion;
        $order->plate_id = $request->plate_id;
        $order->drink_id = $request->drink_id;
        $order->total = $request->total;
        $order->save();
        return json_encode(["success" => true, "message" => "orden creada exitosamente!"]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::where('user_id', $id)->get();
        return json_encode(["orders" => $orders]);
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
        $order = order::find($id);
        $order->user_id = $request->user_id;
        $order->table = $request->table;
        $order->direccion = $request->direccion;
        $order->plate_id = $request->plate_id;
        $order->drink_id = $request->drink_id;
        $order->total = $request->total;
        $order->save();
        return json_encode(["success" => true, "message" => "orden actualizada exitosamente!"]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = order::find($id);
        $order -> delete();
        return json_encode(["success" => true, "message" => "orden eliminada exitosamente!"]);
    }
}
