@extends ('layouts.master')

@section ('content')
	<div>
		<h1>{{ $product->name }}</h1>
		<p>{{ $product->sizes }}</p>
		<p>
			<a href="{{ $product->productCategory->getUrl() }}">
				{{ trans('laravel-food::messages.products.details.back') }}
			</a>
		</p>
	</div>
	<p>{{ $product->description }}</p>
	<div>
		<ul>
			<li class="serves serves__{{ $product->serves }}">
				{{ trans('laravel-food::messages.products.details.serves', array('num' => $product->serves)) }}
			</li>
			<li class="prep_time">
				{{ trans('laravel-food::messages.products.details.prep_time', array('num' => $product->prep_time)) }}
			</li>
			<li class="cook_time">
				{{ trans('laravel-food::messages.products.details.cook_time', array('num' => $product->cook_time)) }}
			</li>
		</ul>
	</div>
	{{ $product->getMainImage('resized') }}
	<div class="stockists">
		<h2>{{ trans('laravel-food::messages.products.details.stockists') }}</h2>
		<p>{{ trans('laravel-food::messages.products.details.stockists_intro') }}</p>
		<ul>
		@foreach ($product->stockists as $stockist)
			<li>
				{{ $stockist->getLogo() }}
			</li>
		@endforeach
		</ul>
	</div>
	@if (!$product->recipes->isEmpty())
		<div class="recipes">
			<h2>{{ trans('laravel-food::messages.products.details.recipes') }}</h2>
			<p>{{ trans('laravel-food::messages.products.details.recipes_intro') }}</p>
			<ul>
				@foreach ($product->recipes as $recipe)
				<li>
					<a href="{{ $recipe->getUrl() }}">{{ $recipe->name }}</a>
				</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="ingredients">
		<h2>{{ trans('laravel-food::messages.products.details.ingredients') }}</h2>
		<p>{{ $product->ingredients }}</p>
	</div>
	<div class="nutritional-info">
		<h2>{{ trans('laravel-food::messages.products.details.nutritional_info') }}</h2>
		<p class="weight">{{ trans('laravel-food::messages.products.details.nutritional_info_weight', array('weight' => '100g')) }}</p>
		<p>{{ $product->nutritional_info }}</p>
	</div>
	<div class="allergen_info">
		<h2>{{ trans('laravel-food::messages.products.details.allergen_info') }}</h2>
		<p>{{ $product->allergen_info }}</p>
		@if ($product->suit_coeliacs)
			<p class="suit_coeliacs">{{ trans('laravel-food::messages.products.details.suit_coeliacs') }}</p>
		@endif
		@if ($product->suit_coeliacs)
			<p class="suit_veggies">{{ trans('laravel-food::messages.products.details.suit_veggies') }}</p>
		@endif
	</div>
@stop