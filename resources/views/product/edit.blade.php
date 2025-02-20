@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Product</h1>

    <form action="{{ route('product.update', $product->id) }}" 
          method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Product Name:</label>
            <input type="text" name="product_name" 
                   class="border px-4 py-2 rounded w-full 
                          @error('product_name') border-red-500 @enderror"
                   value="{{ old('product_name', $product->product_name) }}">
            @error('product_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Category:</label>
            <input type="text" name="category" 
                   class="border px-4 py-2 rounded w-full 
                          @error('category') border-red-500 @enderror"
                   value="{{ old('category', $product->category) }}">
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Harga Jual:</label>
            <input type="number" name="harga_jual" 
                   class="border px-4 py-2 rounded w-full 
                          @error('harga_jual') border-red-500 @enderror"
                   value="{{ old('harga_jual', $product->harga_jual) }}">
            @error('harga_jual')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Harga Beli:</label>
            <input type="number" name="harga_beli" 
                   class="border px-4 py-2 rounded w-full 
                          @error('harga_beli') border-red-500 @enderror"
                   value="{{ old('harga_beli', $product->harga_beli) }}">
            @error('harga_beli')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Packaging:</label>
            <input type="text" name="packaging" 
                   class="border px-4 py-2 rounded w-full 
                          @error('packaging') border-red-500 @enderror"
                   value="{{ old('packaging', $product->packaging) }}">
            @error('packaging')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Packaging Quantity:</label>
            <input type="number" name="packaging_qty" 
                   class="border px-4 py-2 rounded w-full 
                          @error('packaging_qty') border-red-500 @enderror"
                   value="{{ old('packaging_qty', $product->packaging_qty) }}">
            @error('packaging_qty')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Product
        </button>
    </form>
@endsection