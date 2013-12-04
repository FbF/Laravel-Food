<?php namespace Fbf\LaravelFood;

class Product extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_products';

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

	public function getMainImageThumbnail()
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::products.images.main.thumbnails_dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::products.images.main.thumbnails_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::products.images.main.thumbnails_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

	public function getMainImage()
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::products.images.main.originals_dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::products.images.main.originals_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::products.images.main.originals_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

	public static function getTagCloud()
	{
		$products = self::join('fbf_food_product_recipe', 'fbf_food_products.id', '=', 'fbf_food_product_recipe.product_id')
			->select(\DB::raw('fbf_food_products.*, COUNT(DISTINCT(fbf_food_product_recipe.recipe_id)) as num_recipes'))
			->live()
			->get();

		$results = array();
		$maxRecipes = 0;
		foreach ($products as $product)
		{
			$maxRecipes = max($maxRecipes, $product->num_recipes);
		}
		foreach ($products as $product)
		{
			$results = array(
				'name' => $product->name,
				'url' => \URL::action('Fbf\LaravelFood\RecipesController@indexByProduct', array('productSlug' => $product->slug)),
				'weight' => round($product->num_recipes / $maxRecipes, 1)
			);
		}
		return $results;
	}

}