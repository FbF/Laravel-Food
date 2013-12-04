<p class="item--data item--data__serves">
	{{ trans('laravel-food::messages.products.details.serves', array('num' => $product->serves)) }}
</p>
<p class="item--data item--data__prep">
	{{ trans('laravel-food::messages.products.details.prep_time', array('num' => $product->prep_time)) }}
</p>
<p class="item--data item--data__cook">
	{{ trans('laravel-food::messages.products.details.cook_time', array('num' => $product->cook_time)) }}
</p>