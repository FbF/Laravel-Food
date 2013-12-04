@extends ('layouts.master')

@section ('content')
	<div>
		<ul>
			@foreach ($recipeCategories as $recipeCategory)
				<li>
					<a href="{{ action('Fbf\LaravelFood\RecipesController@indexByCategory', array('recipeCategorySlug' => $recipeCategory->slug)) }}">
						{{ $recipeCategory->name }}
					</a>
				</li>
			@endforeach
		</ul>
	</div>
	@include ('laravel-food::partials.recipes_list')
	{{ $recipes->links() }}
@stop