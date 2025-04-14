<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product List</title>
</head>
<body>

    <h1>Products</h1>

    @foreach ($products as $product)
        <div id="product-{{ $product->id }}">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>${{ $product->price }}</p>
            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
            <button onclick="deleteProduct({{ $product->id }})">Delete</button>
        </div>
    @endforeach

    <script>
        function deleteProduct(id) {
            if (!confirm('Are you sure you want to delete this product?')) return;

            fetch(`/products/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(`product-${id}`).remove();
                } else {
                    alert('Failed to delete product.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        }
    </script>

</body>
</html>
