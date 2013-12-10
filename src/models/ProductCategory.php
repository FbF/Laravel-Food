<?php namespace Fbf\LaravelFood;

class ProductCategory extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_product_categories';

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

	public function products()
	{
		return $this->hasMany('Fbf\LaravelFood\Product')->orderBy('name');
	}

	/**
	 * Returns the url of the object's view page
	 * @return string
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\ProductCategoriesController@view', array('productCategorySlug' => $this->slug));
	}

	public function getMainImageResized($options)
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::images.product_categories.main.resized.dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::images.product_categories.main.resized.width').'"';
		$html .= ' height="'.\Config::get('laravel-food::images.product_categories.main.resized.height').'"';
		$html .= (isset($options) && isset($options['class'])) ? ' class="'.$options['class'].'"' : '';
		$html .= ' alt="'.$this->name.'" />';
		return $html;
	}

	public function getStockistImageOriginal()
	{
		if (empty($this->stockist_image))
		{
			return null;
		}
		$relativePathToFile = \Config::get('laravel-food::images.product_categories.stockist.original.dir').$this->stockist_image;
		$html = '<img src="'.$relativePathToFile.'"';
		list($width, $height, $type, $attr) = getimagesize(public_path() . $relativePathToFile);
		$html .= $attr;
		$html .= ' alt="'.$this->name.'" />';
		return $html;
	}

}