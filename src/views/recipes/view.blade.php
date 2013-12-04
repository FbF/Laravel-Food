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
	{{ $recipe->getMainImage() }}
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
	<div class="product">
		{{ $product->getMainImageThumbnail() }}
	</div>
	@if ($recipe->otherRecipe1 || $recipe->otherRecipe2)
		<div class="other-recipes">
			<h2>{{ trans('laravel-food::messages.recipes.details.other_recipes') }}</h2>
			@include ('laravel-food::partials.recipes_list', array('recipes' => array($recipe->otherRecipe1, $recipe->otherRecipe2)))
		</div>
	@endif
@stop