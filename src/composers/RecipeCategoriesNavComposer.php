<?php namespace Fbf\LaravelFood;

class RecipeCategoriesNavComposer {

	public function compose($view)
	{
		$recipeCategories = RecipeCategory::live()->get();
		$view->with('recipeCategories', $recipeCategories);
	}

}