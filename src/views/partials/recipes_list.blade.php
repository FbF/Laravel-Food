<div class="item-list item-list__recipes">
	<ul>
		@foreach ($recipes as $recipe)
		<li class="item-list--item">
			<a href="{{ $recipe->getUrl() }}" title="{{ $recipe->name }}">
				<h2>{{ $recipe->name }}</h2>
				{{ $recipe->getMainImage(array('size' => 'medium', 'class' => 'item-list--image')) }}
				<p class="item-list--description">{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
			</a>
		</li>
		@endforeach
	</ul>
	{{ $recipes->links() }}
</div>