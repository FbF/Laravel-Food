@extends ('layouts.master')

@section('title')
	{{ Config::get('laravel-food::seo.product_categories_index.page_title') }}
@endsection

@section('meta_description')
	{{ Config::get('laravel-food::seo.product_categories_index.meta_description') }}
@endsection

@section('meta_keywords')
	{{ Config::get('laravel-food::seo.product_categories_index.meta_keywords') }}
@endsection

@section ('content')
	@include ('laravel-food::partials.product_categories_nav')
	@include ('laravel-food::partials.product_categories_list')
@stop