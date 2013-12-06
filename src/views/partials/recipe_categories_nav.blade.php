<div class="recipe-categories-nav">
	<ul>
		@foreach ($recipeCategories as $recipeCategory)
			<li{{ Request::url() == $recipeCategory->getUrl() ? ' class="selected"' : '' }}>
				@if (Request::url() == $recipeCategory->getUrl())
					<span>{{ $recipeCategory->name }}</span>
				@else
					<a href="{{ $recipeCategory->getUrl() }}" title="{{ $recipeCategory->name }}">
						{{ $recipeCategory->name }}
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</div>