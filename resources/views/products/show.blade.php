

<p>{{ $product->title }}</p>
<p>{{ $product->description }}</p>
<p>{{ $product->store_name }}</p>
<p>${{ number_format($product->price/100, 0, ',', '.') }} COP</p>
<p>{{ $product->image_url }}</p>
