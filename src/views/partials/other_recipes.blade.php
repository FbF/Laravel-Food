@if ($recipe->otherRecipe1 || $recipe->otherRecipe2)
	<div class="recipe--other-recipes">
		<h3>{{ trans('laravel-food::messages.recipes.details.other_recipes') }}</h3>
		<ul>
			@if ($recipe->otherRecipe1)
			<li>
				<a href="{{ $recipe->otherRecipe1->getUrl() }}" title="{{ $recipe->otherRecipe1->name }}">
					{{ $recipe->otherRecipe1->getMainImage('medium') }}
					<p>{{ $recipe->otherRecipe1->name }}</p>
					<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
				</a>
			</li>
			@endif
			@if ($recipe->otherRecipe2)
			<li>
				<a href="{{ $recipe->otherRecipe2->getUrl() }}" title="{{ $recipe->otherRecipe2->name }}">
					{{ $recipe->otherRecipe2->getMainImage('medium') }}
					<p>{{ $recipe->otherRecipe2->name }}</p>
					<p>{{ trans('laravel-food::messages.recipes.details.view_recipe') }}</p>
				</a>
			</li>
			@endif
		</ul>
	</div>
@endif