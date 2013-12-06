<div class="product--nutritional-info">
	<h3 class="product--nutritional-info--heading">{{ trans('laravel-food::messages.products.details.nutritional_info') }}</h3>
	<p class="product--nutritional-info--weight">{{ trans('laravel-food::messages.products.details.nutritional_info_weight', array('weight' => '100g')) }}</p>
	{{ $product->nutritional_info }}
</div>