<?php namespace Fbf\LaravelFood;

class Stockist extends BaseModel {

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_food_stockists';

	public function products()
	{
		return $this->belongsToMany('Fbf\LaravelFood\Product', 'fbf_food_product_stockist');
	}

	public function getLogo()
	{
		if (empty($this->logo))
		{
			return $this->name;
		}
		$html = '<img src="'.\Config::get('laravel-food::stockists.logo.originals_dir').$this->logo.'"';
		$html .= ' width="'.\Config::get('laravel-food::stockists.logo.originals_width').'"';
		$html .= ' height="'.\Config::get('laravel-food::stockists.logo.originals_height').'"';
		$html .= ' alt="'.$this->name.'"';
		return $html;
	}

}