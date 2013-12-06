@extends ('layouts.master')

@section ('content')
	<h1>{{ $recipe->name }}</h1>
	<a href="{{ $recipe->recipeCategory->getUrl() }}">{{ trans('laravel-food::messages.recipes.details.back') }}</a>
	<p>{{ $recipe->description }}</p>
	<div>
		<ul>
			<li>
				{{ trans('laravel-food::messages.recipes.details.serves', array('num' => $recipe->serves)) }}
			</li>
			<li>
				{{ trans('laravel-food::messages.recipes.details.prep_time', array('num' => $recipe->prep_time)) }}
			</li>
			<li>
				{{ trans('laravel-food::messages.recipes.details.cook_time', array('num' => $recipe->cook_time)) }}
			</li>
		</ul>
	</div>
	{{ $recipe->getMainImage('large') }}
	<p class="nutritional_info">
		{{ trans('laravel-food::messages.recipes.details.per_serving') }}
		{{ $recipe->nutritional_info }}
	</p>
	<div class="ingredients">
		<h2>{{ trans('laravel-food::messages.recipes.details.ingredients') }}</h2>
		<p>{{ $recipe->ingredients }}</p>
	</div>
	<div class="method">
		<h2>{{ trans('laravel-food::messages.recipes.details.method') }}</h2>
		<p>{{ $recipe->method }}</p>
	</div>
	@if ($product)
		<div class="product">
			<a href="{{ $product->getUrl() }}">
				{{ $product->getMainImage('thumbnail') }}
				{{ trans('laravel-food::messages.recipes.details.view_product', array('product' => $product->name)) }}
			</a>
		</div>
	@endif
	@if ($recipe->otherRecipe1 || $recipe->otherRecipe2)
		<div class="other-recipes">
			<h2>{{ trans('laravel-food::messages.recipes.details.other_recipes') }}</h2>
			<ul>
				@if ($recipe->otherRecipe1)
				<li>
					<a href="{{ $recipe->otherRecipe1->getUrl() }}" title="{{ $recipe->otherRecipe1->name }}">
						{{ $recipe->otherRecipe1->getMainImage('medium') }}
						<p>{{ $recipe->otherRecipe1->name }}</p>
						<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
					</a>
				</li>
				@endif
				@if ($recipe->otherRecipe2)
				<li>
					<a href="{{ $recipe->otherRecipe2->getUrl() }}" title="{{ $recipe->otherRecipe2->name }}">
						{{ $recipe->otherRecipe2->getMainImage('medium') }}
						<p>{{ $recipe->otherRecipe2->name }}</p>
						<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
					</a>
				</li>
				@endif
			</ul>
		</div>
	@endif
@stop