<div class="item-list item-list__categories item-list__category-products">
	<ul>
		@foreach ($products as $product)
		<li class="item-list--item">
			<a href="{{ $product->getUrl() }}" title="{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}">
				<h2>{{ $product->name }}</h2>
                <p class="item--list--description">{{ $product->description }}</p>
                {{ $product->getMainImage(array('size' => 'thumbnail', 'class' => 'item-list--image')) }}
				<p class="item-list--more">{{ trans('laravel-food::messages.products.list.view_product_link_text', array('product_name' => $product->name)) }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>