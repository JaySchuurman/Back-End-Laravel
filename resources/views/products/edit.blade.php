<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        margin: 0;
        padding: 40px;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    form div {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px 14px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }

    .error-message {
        color: #d9534f;
        margin-top: 6px;
        font-size: 14px;
    }
</style>

</head>

<body>
    <h1>{{ isset($product) ? 'Edit a Product' : 'Create a Product' }}</h1>

    <form method="post" action="{{ isset($product) ? route('product.store', $product->id) : route('product.store') }}">
        @csrf
        @method('POST')

        @if(isset($product))
            <input type="hidden" name="id" value="{{ $product->id }}">
        @endif

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Name" />
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Price" />
            @error('price')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description', $product->description ?? '') }}" placeholder="Description" />
        </div>

        <div>
            <input type="submit" value="{{ isset($product) ? 'Update Product' : 'Save a New Product' }}" />
        </div>
    </form>
</body>


</html>