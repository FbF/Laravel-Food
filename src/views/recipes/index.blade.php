@extends ('layouts.master')

@section('title')
	@if (isset($recipeCategory))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_category.page_title'), $recipeCategory->name) }}
	@elseif (isset($product))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_product.page_title'), $product->name) }}
	@endif
@endsection

@section('meta_description')
	@if (isset($recipeCategory))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_category.meta_description'), $recipeCategory->name) }}
	@elseif (isset($product))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_product.meta_description'), $product->name) }}
	@endif
@endsection

@section('meta_keywords')
	@if (isset($recipeCategory))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_category.meta_keywords'), $recipeCategory->name) }}
	@elseif (isset($product))
		{{ sprintf(Config::get('laravel-food::seo.recipes_index_by_product.meta_keywords'), $product->name) }}
	@endif
@endsection

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