<?php namespace Fbf\LaravelFood;

class RecipeCategory extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_recipe_categories';

	public function recipes()
	{
		return $this->hasMany('Recipe');
	}

	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\RecipesController@indexByCategory', array('recipeCategorySlug' => $this->slug));
	}

}