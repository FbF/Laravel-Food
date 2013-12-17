<?php namespace Fbf\LaravelFood;

class RecipeCategoriesNavComposer {

	public function compose($view)
	{
		$recipeCategories = RecipeCategory::live()->get();
		$items = array();
		foreach ($recipeCategories as $recipeCategory)
		{
			$items[$recipeCategory->getUrl()] = $recipeCategory->name;
		}
		$view->with('recipeCategories', $items);
	}

}