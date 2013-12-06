@extends ('layouts.master')

@section ('content')
	@include ('laravel-food::partials.recipe_categories_nav')
	@include ('laravel-food::partials.recipe_products_tag_cloud')
	@include ('laravel-food::partials.recipe_categories_list')
@stop