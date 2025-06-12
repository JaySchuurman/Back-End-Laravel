<?php

namespace App\Http\Controllers;

use App\Models\Order;  
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // Show form to create an order with products
    public function create()
    {
        $products = Products::all();
        return view('orders.create', compact('products'));
    }

    // Store a newly created order with selected products
   public function store(Request $request)
{
    $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'products' => 'required|array|min:1',
        'products.*' => 'exists:products,id',
    ]);

    $order = new Order();
    $order->customer_name = $validated['customer_name'];
    $order->status = 'pending';
    $order->order_date = now();
    $order->user_id = auth()->id(); // or assign accordingly
    $order->save();

    $order->products()->attach($validated['products']);

    return redirect()->route('orders.index')->with('message', 'Order placed successfully!');
}





    // List all orders with user and order items relations
    public function index()
    {
        $orders = Order::with(['user', 'orderItems'])->get();
    return view('orders.index', compact('orders'));    }

    // Show one order
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems'])->findOrFail($id);
return redirect()->route('orders.index')->with('message', 'Order placed successfully!');
    }

    // Update order
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

    // Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
