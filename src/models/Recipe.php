<?php namespace Fbf\LaravelFood;

class Recipe extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_recipes';

	/**
	 * Used for Cviebrock/EloquentSluggable
	 * @var array
	 */
	public static $sluggable = array(
		'build_from' => 'name',
		'save_to' => 'slug',
		'separator' => '-',
		'unique' => true,
	);

	public function recipeCategory()
	{
		return $this->belongsTo('Fbf\LaravelFood\RecipeCategory');
	}

	public function otherRecipe1()
	{
		return $this->belongsTo('Fbf\LaravelFood\Recipe', 'other_recipe_1_id');
	}

	public function otherRecipe2()
	{
		return $this->belongsTo('Fbf\LaravelFood\Recipe', 'other_recipe_2_id');
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

	public function getMainImage($options = array())
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::images.recipes.main.'.$options['size'].'.dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::images.recipes.main.'.$options['size'].'.width').'"';
		$html .= ' height="'.\Config::get('laravel-food::images.recipes.main.'.$options['size'].'.height').'"';
		$html .= (isset($options['class'])) ? ' class="'.$options['class'].'"' : '';
		$html .= ' alt="'.$this->name.'" />';
		return $html;
	}

}