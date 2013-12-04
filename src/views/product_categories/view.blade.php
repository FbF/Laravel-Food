@extends ('layouts.master')

@section ('content')
	@include ('laravel-food::partials.product_categories_nav')
	<div class="item-category item-category__product-categories">
		<h1 class="item-category--heading">
			@if (Config::get('laravel-food::fields.brand_message_heading_prefix'))
				<span class="item-category--heading-prefix">{{ $productCategory->brand_message_heading_prefix }}</span>
			@endif
			{{ $productCategory->name }}
		</h1>
		<p class="item-category--brand-message">
			{{ Config::get('laravel-food::fields.brand_message') ? $productCategory->brand_message : '' }}
		</p>
		<p class="item-category--description">
			{{ $productCategory->description }}
		</p>
	</div>
	@include ('laravel-food::partials.product_list')
@stop