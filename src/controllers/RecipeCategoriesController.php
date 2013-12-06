<?php namespace Fbf\LaravelFood;

class RecipeCategoriesController extends \BaseController {

	public function index()
	{
		$recipeCategories = RecipeCategory::live()->orderBy('order', 'asc')->get();
		return \View::make(\Config::get('laravel-food::views.recipe_categories.index'))->with(compact('recipeCategories'));
	}

}