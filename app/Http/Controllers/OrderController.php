<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index');
        //
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
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'total' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'payable' => 'required|numeric',
            'paid' => 'nullable|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'zip' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            'payment_id' => 'nullable|string',
            'details' => 'required|string',
        ]);
        $order = Order::create($request->all());
        return response()->json($order, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
