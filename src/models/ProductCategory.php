<?php namespace Fbf\LaravelFood;

class ProductCategory extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_product_categories';

	public function products()
	{
		return $this->hasMany('Product');
	}

	/**
	 * Returns the url of the object's view page
	 * @return string
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelFood\ProductCategoriesController@view', array('productCategorySlug' => $this->slug));
	}

	public function getMainImageThumbnail()
	{
		if (empty($this->main_image))
		{
			return null;
		}
		$html = '<img src="'.\Config::get('laravel-food::product_categories.images.main.thumbnails_dir').$this->main_image.'"';
		$html .= ' width="'.\Config::get('laravel-food::product_categories.images.main.thumbnails_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::product_categories.images.main.thumbnails_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

}