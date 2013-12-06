@extends ('layouts.master')

@section ('content')
	<div class="product">
		<div>
			<h1 class="product--heading">{{ $product->name }}</h1>
			<p class="product--sizes">{{ $product->sizes }}</p>
			<p class="product--back">
				<a href="{{ $product->productCategory->getUrl() }}">
					{{ trans('laravel-food::messages.products.details.back') }}
				</a>
			</p>
		</div>
		{{ $product->description }}
		@include ('laravel-food::partials.product_essentials')
		{{ $product->getMainImage('resized') }}
		@include ('laravel-food::partials.product_stockists')
		@include ('laravel-food::partials.product_recipes')
		@include ('laravel-food::partials.product_ingredients')
		@include ('laravel-food::partials.product_nutritional_info')
		@include ('laravel-food::partials.product_allergen_info')
	</div>
@stop