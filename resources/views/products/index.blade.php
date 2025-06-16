<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-gray-800 dark:text-gray-200 text-2xl font-semibold">Products</h1>
    </x-slot>

    <style>
        .product-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .product-card h3 {
            margin-top: 0;
            color: #007bff;
        }

        .product-card p {
            margin: 5px 0;
        }

        .product-card a,
        .product-card button {
            display: inline-block;
            margin-top: 10px;
            margin-right: 10px;
            padding: 8px 14px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .product-card a {
            background-color: #17a2b8;
            color: #fff;
        }

        .product-card button {
            background-color: #dc3545;
            color: #fff;
        }

        .product-card a:hover {
            background-color: #138496;
        }

        .product-card button:hover {
            background-color: #c82333;
        }
    </style>

    <div class="product-list">
        @foreach ($products as $product)
            <div id="product-{{ $product->id }}" class="product-card">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
                <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                <button onclick="deleteProduct({{ $product->id }})">Delete</button>
            </div>
        @endforeach
    </div>

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
</x-app-layout>
