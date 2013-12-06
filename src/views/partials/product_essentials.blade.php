<div class="product--essentials">
	<ul>
		<li class="product--essentials--serves product--essentials--serves__{{ $product->serves }}">
			{{ trans('laravel-food::messages.products.details.serves', array('num' => $product->serves)) }}
		</li>
		<li class="product--essentials--prep-time">
			{{ trans('laravel-food::messages.products.details.prep_time', array('num' => $product->prep_time)) }}
		</li>
		<li class="product--essentials--cook-time">
			{{ trans('laravel-food::messages.products.details.cook_time', array('num' => $product->cook_time)) }}
		</li>
	</ul>
</div>