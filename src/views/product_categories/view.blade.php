@extends ('layouts.master')

@section('title')
	{{ $productCategory->page_title }}
@endsection

@section('meta_description')
	{{ $productCategory->meta_description }}
@endsection

@section('meta_keywords')
	{{ $productCategory->meta_keywords }}
@endsection

@section ('content')
	@include ('laravel-food::partials.product_list')
@stop