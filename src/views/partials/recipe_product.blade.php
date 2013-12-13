@if ($product)
	<div class="recipe--product">
		<a href="{{ $product->getUrl() }}">
			{{ $product->getMainImage(array( 'size' => 'thumbnail' )) }}
			<span class="recipe--product--text">{{ trans('laravel-food::messages.recipes.details.view_product', array('product' => $product->name)) }}</span>   
		</a>
	</div>
@endif