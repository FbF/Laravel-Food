@extends ('layouts.master')

@section ('content')
	@include ('laravel-food::partials.recipe_categories_nav')
	@include ('laravel-food::partials.recipe_products_tag_cloud')
	@if (isset($recipeCategory))
		<h1>{{ $recipeCategory->name}}</h1>
		<p>{{ $recipeCategory->description }}</p>
	@elseif (isset($product))
		<h1>{{ $product->name}}</h1>
		<p>{{ $product->description }}</p>
	@endif
	@include ('laravel-food::partials.recipes_list')
@stop