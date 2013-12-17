<?php namespace Fbf\LaravelFood;

class RecipesController extends BaseController {

	public function indexByCategory($recipeCategorySlug)
	{
		$recipeCategory = RecipeCategory::live()->where('slug', '=', $recipeCategorySlug)->first();

		if (!$recipeCategory)
		{
			\App::abort(404);
		}

		$recipes = Recipe::select('fbf_food_recipes.*')
			->join('fbf_food_recipe_categories', 'fbf_food_recipes.recipe_category_id', '=', 'fbf_food_recipe_categories.id')
			->where('fbf_food_recipe_categories.slug', '=', $recipeCategorySlug)
			->live()
			->paginate();

		return \View::make(\Config::get('laravel-food::views.recipes.index'))->with(compact('recipeCategory', 'recipes'));
	}

	public function indexByProduct($productSlug)
	{
		$product = Product::live()->where('slug', '=', $productSlug)->first();

		if (!$product)
		{
			\App::abort(404);
		}

		$recipes = Recipe::select('fbf_food_recipes.*')
			->join('fbf_food_product_recipe', 'fbf_food_recipes.id', '=', 'fbf_food_product_recipe.recipe_id')
			->join('fbf_food_products', 'fbf_food_product_recipe.product_id', '=', 'fbf_food_products.id')
			->where('fbf_food_products.slug', '=', $productSlug)
			->live()
			->paginate();

		return \View::make(\Config::get('laravel-food::views.recipes.index'))->with(compact('product', 'recipes'));
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

		return \View::make(\Config::get('laravel-food::views.recipes.view'))->with(compact('recipe', 'product'));
	}

}