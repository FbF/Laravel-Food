<?php namespace Fbf\LaravelFood;

class RecipeCategory extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_recipe_categories';

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

	public function recipes()
	{
		return $this->hasMany('Recipe');
	}

	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\RecipesController@indexByCategory', array('recipeCategorySlug' => $this->slug));
	}

	public function getMainImageResized($options = array())
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::images.recipe_categories.main.resized.dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::images.recipe_categories.main.resized.width').'"';
		$html .= ' height="'.\Config::get('laravel-food::images.recipe_categories.main.resized.height').'"';
		$html .= (isset($options['class'])) ? ' class="'.$options['class'].'"' : '';
		$html .= ' alt="'.$this->name.'">';
		return $html;
	}

}