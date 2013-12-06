<div class="product--allergen-info">
	<h3 class="product--allergen-info--heading">{{ trans('laravel-food::messages.products.details.allergen_info') }}</h3>
	<p class="product--allergen-info--text">{{ $product->allergen_info }}</p>
	@if ($product->suit_coeliacs)
		<p class="product--allergen-info--suit-coeliacs">
			{{ trans('laravel-food::messages.products.details.suit_coeliacs') }}
		</p>
	@endif
	@if ($product->suit_coeliacs)
		<p class="product--allergen-info--suit-veggies">
			{{ trans('laravel-food::messages.products.details.suit_veggies') }}
		</p>
	@endif
</div>