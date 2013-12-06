<div>
	<ul>
		@foreach ($recipes as $recipe)
		<li>
			<a href="{{ $recipe->getUrl() }}" title="{{ $recipe->name }}">
				{{ $recipe->getMainImage('medium') }}
				<p>{{ $recipe->name }}</p>
				<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
			</a>
		</li>
		@endforeach
	</ul>
	{{ $recipes->links() }}
</div>