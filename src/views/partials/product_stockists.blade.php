<div class="product--stockists">
	<h3 class="product--stockists--heading">{{ trans('laravel-food::messages.products.details.stockists') }}</h3>
	<p class="product--stockists--intro">{{ trans('laravel-food::messages.products.details.stockists_intro') }}</p>
	<ul class="product--stockists--list">
		@foreach ($product->stockists as $stockist)
		<li>
			{{ $stockist->getLogo() }}
		</li>
		@endforeach
	</ul>
</div>