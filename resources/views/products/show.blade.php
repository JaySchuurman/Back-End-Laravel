<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<a href="{{ route('product.index') }}">Back to Products</a>
