@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-3xl font-bold">Add New Product</h1>

    <form action="{{ route('product.store', [], true) }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">Product Name:</label>
            <input type="text" name="product_name" 
                   class="border px-4 py-2 rounded w-full 
                          @error('product_name') border-red-500 @enderror"
                   value="{{ old('product_name') }}">
            @error('product_name')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Category:</label>
            <input type="text" name="category" 
                   class="border px-4 py-2 rounded w-full 
                          @error('category') border-red-500 @enderror"
                   value="{{ old('category') }}">
            @error('category')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Harga Jual:</label>
            <input type="number" name="harga_jual" 
                   class="border px-4 py-2 rounded w-full 
                          @error('harga_jual') border-red-500 @enderror"
                   value="{{ old('harga_jual') }}">
            @error('harga_jual')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Harga Beli:</label>
            <input type="number" name="harga_beli" 
                   class="border px-4 py-2 rounded w-full 
                          @error('harga_beli') border-red-500 @enderror"
                   value="{{ old('harga_beli') }}">
            @error('harga_beli')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Packaging:</label>
            <input type="text" name="packaging" 
                   class="border px-4 py-2 rounded w-full 
                          @error('packaging') border-red-500 @enderror"
                   value="{{ old('packaging') }}">
            @error('packaging')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block">Packaging Quantity:</label>
            <input type="number" name="packaging_qty" 
                   class="border px-4 py-2 rounded w-full 
                          @error('packaging_qty') border-red-500 @enderror"
                   value="{{ old('packaging_qty') }}">
            @error('packaging_qty')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
                class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            Save Product
        </button>
    </form>
@endsection