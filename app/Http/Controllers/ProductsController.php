<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index',[
            'products' => Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validated= $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'price' => 'required|decimal:2'
    ]);

    $product = Products::find($request->id);
    if ($product) {

        // Update existing product
        $product->update($validated);
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    } else {
        // Create a new product
        Products::create($validated);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    return redirect('products');
   } 


    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Products $product)
{
    $product = Products::findOrFail($product->id);
    //dd($product);
    return view('products.edit', compact('product'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {

    $products->delete();
    return response()->json(['message' => 'Deleted']);


    }
}
