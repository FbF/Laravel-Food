<?php namespace Fbf\LaravelFood;

class Recipe extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_recipes';

	public function recipeCategory()
	{
		return $this->belongsTo('Fbf\LaravelFood\RecipeCategory');
	}

	public function otherRecipe1()
	{
		return $this->belongsTo('Fbf\LaravelFood\Recipe', 'other_recipe_1');
	}

	public function otherRecipe2()
	{
		return $this->belongsTo('Fbf\LaravelFood\Recipe', 'other_recipe_2');
	}

	public function products()
	{
		return $this->belongsToMany('Fbf\LaravelFood\Product', 'fbf_food_product_recipe');
	}

	/**
	 * Returns the url of the object's view page
	 * @return string
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\RecipesController@view', array('recipeCategorySlug' => $this->recipeCategory->slug, 'recipeSlug' => $this->slug));
	}

	public function getMainImage()
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::recipes.images.main.originals_dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::recipes.images.main.originals_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::recipes.images.main.originals_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

	public function getMainImageThumbnail()
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::recipes.images.main.thumbnails_dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::recipes.images.main.thumbnails_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::recipes.images.main.thumbnails_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

}