<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $allProduct = Product::when($query, function($q) use ($query) {
        $q->where('product_name', 'like', "%$query%");})->get();
        return view('product.index', compact('allProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:100',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'packaging' => 'required|max:100',
            'packaging_qty' => 'required',
            'category' => 'required',
        ]);

        Product::create($validatedData);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:100',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'packaging' => 'required|max:100',
            'packaging_qty' => 'required',
            'category' => 'required',
        ]);

        $product->update($validatedData);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
