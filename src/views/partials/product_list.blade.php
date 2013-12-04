<div class="item-list">
	<ul>
		@foreach ($products as $product)
		<li class="item-list--item">
			<a href="{{ $product->getUrl() }}" title="{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}">
				{{ $product->getMainImageThumbnail() }}
				<h2>{{ $product->name }}</h2>
				<p>{{ $product->description }}</p>
				<p class="item-list--more">{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>