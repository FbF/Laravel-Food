<?php namespace Fbf\LaravelFood;

class RecipeProductsTagCloudComposer {

	public function compose($view)
	{
		$productTags = Product::getTagCloud();
		$view->with(compact('productTags'));
	}

}