<div>
	<ul>
		@foreach ($recipeCategories as $recipeCategory)
		<li>
			<a href="{{ $recipeCategory->getUrl() }}" title="{{ $recipeCategory->name }}">
				{{ $recipeCategory->getMainImageResized() }}
				<h2>{{ $recipeCategory->name }}</h2>
				<p>{{ $recipeCategory->description }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>