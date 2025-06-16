<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-gray-800 dark:text-gray-200 text-2xl font-semibold">Create an Order</h1>
    </x-slot>

    <style>
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #34495e;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
        }
        .products-list {
            margin-top: 20px;
            max-height: 250px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background: #fafafa;
        }
        .products-list div {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }
        .products-list input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        .products-list label {
            font-weight: 500;
            cursor: pointer;
            user-select: none;
        }
        .products-list label:hover {
            color: #3498db;
        }
        .error-message {
            color: #e74c3c;
            margin-top: 5px;
            font-size: 0.9rem;
        }
        .flash-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 15px;
            margin-bottom: 25px;
            border-radius: 7px;
            font-weight: 600;
            text-align: center;
        }
        button[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 30px;
            letter-spacing: 1px;
        }
        button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>

    <div class="container">
        @if(session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <label for="customer_name">Your Name</label>
            <input 
                type="text" 
                id="customer_name" 
                name="customer_name" 
                placeholder="Enter your name" 
                value="{{ old('customer_name') }}" 
                required
            />
            @error('customer_name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="products-list" aria-label="Choose Products">
                <label>Choose Products</label>
                @foreach($products as $product)
                    <div>
                        <input 
                            type="checkbox" 
                            name="products[]" 
                            id="product_{{ $product->id }}" 
                            value="{{ $product->id }}"
                            {{ (is_array(old('products')) && in_array($product->id, old('products'))) ? 'checked' : '' }}
                        />
                        <label for="product_{{ $product->id }}">
                            {{ $product->name }} — ${{ number_format($product->price, 2) }}
                        </label>
                    </div>
                @endforeach
                @error('products')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Place Order</button>
        </form>
    </div>
</x-app-layout>
