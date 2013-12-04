<div class="item-list">
	<ul>
		@foreach ($productCategories as $productCategory)
		<li class="item-list--item">
			<a href="{{ $productCategory->getUrl() }}" title="{{ trans('laravel-food::messages.product_categories.list.view_products_link_text', array('product_category_name' => $productCategory->name)) }}">
				<h2>{{ $productCategory->getMainImageThumbnail() }}</h2>
				<p>{{ $productCategory->name }}</p>
				<p class="item-list--more">{{ trans('laravel-food::messages.product_categories.list.view_products_link_text', array('product_category_name' => $productCategory->name)) }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>