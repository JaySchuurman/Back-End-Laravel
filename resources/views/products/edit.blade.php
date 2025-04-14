<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h1>Edit a Product</h1>
    <form method="post" action="{{ isset($product) ? route('product.store', $product->id) : route('product.store') }}">
        @csrf

        @method('POST') <!-- Use POST for creating -->
        @if(isset($product))
            <input type="hidden" name="id" value="{{ $product->id }}">
        @endif

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ isset($product) ? $product->name : '' }}" placeholder="Name" />
        </div>
        <div>
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ isset($product) ? $product->price : '' }}"
                placeholder="Price" />
            @error('price')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" value="{{ isset($product) ? $product->description : '' }}"
                placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="{{ isset($product) ? 'Update Product' : 'Save a New Product' }}" />
        </div>
    </form>
</body>

</html>