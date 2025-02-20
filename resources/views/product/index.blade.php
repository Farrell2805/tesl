@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Product List</h1>

    <!-- Search Bar -->
    <form action="{{ route('product.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Search products..." 
               class="border px-4 py-2 rounded">
        <button type="submit" 
                class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Search
        </button>
    </form>

    <!-- Add Product Button -->
    <a href="{{ route('product.create') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4">
        Add Product
    </a>

    <!-- Product List -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mt-5">
        @foreach($allProduct as $product)
            <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4">
                <div class="w-24 h-24 bg-gray-200 flex items-center justify-center text-gray-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" 
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4l1-12z">
                        </path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $product->category }}</p>
                    <p class="text-green-600 font-bold">
                        Rp. {{ number_format($product->harga_jual, 0, ',', '.') }}
                    </p>
                </div>
                <div class="flex flex-col items-end">
                    <a href="{{ route('product.show', $product->id) }}" 
                       class="text-blue-600 hover:underline mb-2">
                        View Details
                    </a>
                    <a href="{{ route('product.edit', $product->id) }}" 
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>
                    <form action="{{ route('product.destroy', $product->id) }}" 
                        method="POST" class="mt-2">
                      @csrf
                      @method('DELETE')
                      <button type="button" 
                              class="text-red-500 hover:text-red-600 delete-btn">
                          Delete
                      </button>
                  </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        const form = this.closest('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush