@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-3xl font-bold">Product List</h1>

    <!-- Search Bar -->
    <form action="{{ route('product.index', [], true) }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Search products..." 
               class="px-4 py-2 border rounded">
        <button type="submit" 
                class="px-4 py-2 ml-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            Search
        </button>
    </form>

    <!-- Add Product Button -->
    <a href="{{ route('product.create', [], true) }}" 
       class="px-4 py-2 mb-4 text-white bg-green-500 rounded hover:bg-green-600">
        Add Product
    </a>

    <!-- Product List -->
    <div class="grid grid-cols-1 gap-4 mt-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach($allProduct as $product)
            <div class="flex items-center p-4 space-x-4 bg-white rounded-lg shadow">
                <div class="flex items-center justify-center w-24 h-24 text-gray-500 bg-gray-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" 
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4l1-12z">
                        </path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>
                    <p class="text-sm text-gray-600">{{ $product->category }}</p>
                    <p class="font-bold text-green-600">
                        Rp. {{ number_format($product->harga_jual, 0, ',', '.') }}
                    </p>
                </div>
                <div class="flex flex-col items-end">
                    <a href="{{ route('product.show', $product->id, true) }}" 
                       class="mb-2 text-blue-600 hover:underline">
                        View Details
                    </a>
                    <a href="{{ route('product.edit', $product->id, true) }}" 
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>
                    <form action="{{ route('product.destroy', $product->id, true) }}" 
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