<?php namespace Fbf\LaravelFood;

class RecipesController extends \BaseController {

	public function indexByCategory($recipeCategorySlug)
	{
		$recipes = Recipe::join('fbf_food_recipe_categories', 'fbf_food_recipes.recipe_category_id', '=', 'fbf_food_recipe_categories.id')
			->where('fbf_food_recipe_categories.slug', '=', $recipeCategorySlug)
			->live()
			->paginate();

		return \View::make(\Config::get('laravel-food::recipes.views.index'))->with(compact('recipes'));
	}

	public function view($recipeCategorySlug, $recipeSlug)
	{
		$recipe = Recipe::with(array(
				'recipeCategory' => function($query) use ($recipeCategorySlug)
					{
						$query->where('slug', '=', $recipeCategorySlug);
					},
				'otherRecipe1',
				'otherRecipe2',
				'products' => function($query)
					{
						$query->take(1);
					},
			))
			->where('slug', '=', $recipeSlug)
			->live()
			->first();

		if (!$recipe)
		{
			\App::abort(404);
		}

		$product = current(current($recipe->products));

		return \View::make(\Config::get('laravel-food::recipes.views.view'))->with(compact('recipe', 'product'));
	}

}