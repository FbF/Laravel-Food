@extends ('layouts.master')

@section('title')
	{{ Config::get('laravel-food::seo.stockists.page_title') }}
@endsection

@section('meta_description')
	{{ Config::get('laravel-food::seo.stockists.meta_description') }}
@endsection

@section('meta_keywords')
	{{ Config::get('laravel-food::seo.stockists.meta_keywords') }}
@endsection

@section ('content')
	@include ('laravel-food::partials.stockists_table')
	@include ('laravel-food::partials.stockists_list')
@stop