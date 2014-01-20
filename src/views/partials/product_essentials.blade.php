<div class="essentials essentials__product">
	<ul>
		@if ($product->productCategory->essentials_type == Fbf\LaravelFood\ProductCategory::SERVES_PREP_COOK)
			<li class="essentials--serves essentials--serves__{{ $product->serves }}">
				{{ trans('laravel-food::messages.products.details.serves', array('num' => $product->serves)) }}
			</li>
			<li class="essentials--prep-time">
				{{ trans('laravel-food::messages.products.details.prep_time', array('num' => $product->prep_time)) }}
			</li>
			<li class="essentials--cook-time">
				{{ trans('laravel-food::messages.products.details.cook_time', array('num' => $product->cook_time)) }}
			</li>
		@else
			<li class="essentials--teaspoon-equivalent">
				{{ trans('laravel-food::messages.products.details.teaspoon_equivalent', array('equivalent' => $product->teaspoon_equivalent)) }}
			</li>
			<li class="essentials--use-within">
				{{ trans('laravel-food::messages.products.details.use_within', array('within' => $product->use_within)) }}
			</li>
		@endif
	</ul>
</div>