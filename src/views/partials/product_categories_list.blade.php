<div class="item-list item-list__categories">
	<ul>
		@foreach ($productCategories as $productCategory)
		<li class="item-list--item">
			<a href="{{ $productCategory->getUrl() }}" title="{{ trans('laravel-food::messages.product_categories.list.view_products_link_text', array('product_category_name' => $productCategory->name)) }}">
				<h2>{{ $productCategory->getMainImageResized() }}</h2>
				<p>{{ $productCategory->name }}</p>
				<p class="item-list--more">{{ trans('laravel-food::messages.product_categories.list.view_products_link_text', array('product_category_name' => $productCategory->name)) }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>