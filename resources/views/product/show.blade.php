@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-3xl font-bold">{{ $product->product_name }}</h1>

    <div class="p-4 border rounded-lg">
        <p><strong>Category:</strong> {{ $product->category }}</p>
        <p><strong>Harga Jual:</strong> 
            Rp. {{ number_format($product->harga_jual, 0, ',', '.') }}
        </p>
        <p><strong>Harga Beli:</strong> 
            Rp. {{ number_format($product->harga_beli, 0, ',', '.') }}
        </p>
        <p><strong>Packaging:</strong> {{ $product->packaging }}</p>
        <p><strong>Packaging Quantity:</strong> {{ $product->packaging_qty }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('product.edit', $product->id, true) }}" 
           class="px-4 py-2 mr-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            Edit Product
        </a>
        <form action="{{ route('product.destroy', $product->id, true) }}" 
              method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="button" 
                    class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600 delete-btn">
                Delete Product
            </button>
        </form>
    </div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const form = this.closest('form');
        Swal.fire({
            title: 'Confirm Delete',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel'
        }).then(result => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                Swal.fire('Cancelled', 'Product is safe!', 'info');
            }
        });
    });
});
</script>
@endpush