<div class="item-list item-list__recipes">
	<ul>
		@foreach ($recipeCategories as $recipeCategory)
		<li class="item-list--item">
			<a href="{{ $recipeCategory->getUrl() }}" title="{{ $recipeCategory->name }}">
				<h2>{{ $recipeCategory->name }}</h2>
				{{ $recipeCategory->getMainImageResized(array('class' => 'item-list--image')) }}
				<p class="item-list--description">{{ $recipeCategory->description }}</p>
			</a>
		</li>
		@endforeach
	</ul>
</div>
