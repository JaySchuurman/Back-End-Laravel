<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-gray-800 dark:text-gray-200 text-2xl font-semibold">Orders</h1>
    </x-slot>

    <style>
        .flash-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .error-message {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .orders-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .order {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .order h3 {
            margin-top: 0;
            color: #007bff;
        }

        .order p {
            margin: 5px 0;
        }

        .products-list {
            margin-top: 10px;
            padding-left: 20px;
        }
    </style>

    @if (session('message'))
        <div class="flash-message">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @isset($orders)
        <div class="orders-container">
            @foreach ($orders as $order)
                <div class="order">
                    <h3>Order #{{ $order->id }} - {{ $order->customer_name }}</h3>
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    <p><strong>Order Date:</strong> {{ $order->order_date ? $order->order_date->format('F j, Y, g:i a') : 'N/A' }}</p>
                    <p><strong>Products:</strong></p>
                    <ul class="products-list">
                        @foreach ($order->products as $product)
                            <li>{{ $product->name }} ({{ number_format($product->price, 2) }}$)</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No orders found.</p>
    @endisset

</x-app-layout>
