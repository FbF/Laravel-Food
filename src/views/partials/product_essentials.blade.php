<div class="essentials essentials__product">
	<ul>
		<li class="essentials--serves essentials--serves__{{ $product->serves }}">
			{{ trans('laravel-food::messages.products.details.serves', array('num' => $product->serves)) }}
		</li>
		<li class="essentials--prep-time">
			{{ trans('laravel-food::messages.products.details.prep_time', array('num' => $product->prep_time)) }}
		</li>
		<li class="essentials--cook-time">
			{{ trans('laravel-food::messages.products.details.cook_time', array('num' => $product->cook_time)) }}
		</li>
	</ul>
</div>