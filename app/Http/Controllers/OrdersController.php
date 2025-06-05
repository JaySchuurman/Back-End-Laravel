<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        $orders = Order::with(['user', 'orderItems'])->get();
        return response()->json($orders);
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    // Display the specified order
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems'])->findOrFail($id);
        return response()->json($order);
    }

    // Update the specified order in storage
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'order_date' => 'sometimes|date',
            'status' => 'sometimes|string',
        ]);

        $order->update($validated);

        return response()->json($order);
    }

    // Remove the specified order from storage
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
