<div class="item item__product">
	<h1>{{ $product->name }}</h1>
	{{ $product->getMainImage() }}
	<p class="description">
		{{ $product->description }}
	</p>
	@include ('laravel-food::product_data')
	@include ('laravel-food::product_stockists')
	@include ('laravel-food::product_ingredients_nutrition')
</div>