<div class="recipe-list">
	<ul>
		@foreach ($recipes as $recipe)
		<li>
			<a href="{{ $recipe->getUrl() }}" title="{{ $recipe->name }}">
				<p>{{ $recipe->name }}</p>
				{{ $recipe->getMainImageThumbnail() }}
				<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>