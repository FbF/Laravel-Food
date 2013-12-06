<div>
	<ul>
		@foreach ($products as $product)
		<li>
			<a href="{{ $product->getUrl() }}" title="{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}">
				{{ $product->getMainImage('thumbnail') }}
				<h2>{{ $product->name }}</h2>
				<p>{{ $product->description }}</p>
				<p>{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>