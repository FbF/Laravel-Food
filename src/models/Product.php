<?php namespace Fbf\LaravelFood;

class Product extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_products';

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

	public function productCategory()
	{
		return $this->belongsTo('Fbf\LaravelFood\ProductCategory');
	}

	public function recipes()
	{
		return $this->belongsToMany('Fbf\LaravelFood\Recipe', 'fbf_food_product_recipe');
	}

	public function stockists()
	{
		return $this->belongsToMany('Fbf\LaravelFood\Stockist', 'fbf_food_product_stockist');
	}

	/**
	 * Returns the url of the object's view page
	 * @return string
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\ProductsController@view', array('productCategorySlug' => $this->productCategory->slug, 'productSlug' => $this->slug));
	}

	public function getMainImage($options = array())
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::images.products.main.'.$options['size'].'.dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::images.products.main.'.$options['size'].'.width').'"';
		$html .= ' height="'.\Config::get('laravel-food::images.products.main.'.$options['size'].'.height').'"';
		$html .= (isset($options['class'])) ? ' class="'.$options['class'].'"' : '';
		$html .= ' alt="'.$this->name.'" />';
		return $html;
	}

	public static function getTagCloud()
	{
		$products = self::join('fbf_food_product_recipe', 'fbf_food_products.id', '=', 'fbf_food_product_recipe.product_id')
			->join('fbf_food_recipes', 'fbf_food_product_recipe.recipe_id', '=', 'fbf_food_recipes.id')
			->select(\DB::raw('fbf_food_products.*, COUNT(fbf_food_product_recipe.recipe_id) as num_recipes'))
			->live()
			->where('fbf_food_recipes.status', '=', Recipe::APPROVED)
			->where('fbf_food_recipes.published_date', '<=', \Carbon\Carbon::now())
			->groupBy('fbf_food_products.id')
			->orderBy('fbf_food_products.name', 'asc')
			->get();

		$results = array();
		$maxRecipes = 0;
		foreach ($products as $product)
		{
			$maxRecipes = max($maxRecipes, $product->num_recipes);
		}
		foreach ($products as $product)
		{
			if ($product->num_recipes == 0)
			{
				continue;
			}
			$results[] = array(
				'name' => $product->name,
				'url' => \URL::action('Fbf\LaravelFood\RecipesController@indexByProduct', array('productSlug' => $product->slug)),
				'weight' => round($product->num_recipes / $maxRecipes, 1) * 10,
			);
		}
		return $results;
	}

}