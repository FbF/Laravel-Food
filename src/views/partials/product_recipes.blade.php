<div class="product--recipes">
	<h3 class="product--recipes--heading">{{ trans('laravel-food::messages.products.details.recipes') }}</h3>
	<p class="product--recipes--intro">{{ trans('laravel-food::messages.products.details.recipes_intro') }}</p>
	<ul class="product--recipes--list">
		@foreach ($product->recipes as $recipe)
		<li>
			<a href="{{ $recipe->getUrl() }}">
				{{ $recipe->name }}
			</a>
		</li>
		@endforeach
	</ul>
</div>