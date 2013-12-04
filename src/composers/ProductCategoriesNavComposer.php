<?php namespace Fbf\LaravelFood;

class ProductCategoriesNavComposer {

	public function compose($view)
	{
		$productCategories = ProductCategory::live()->get();
		$view->with('productCategories', $productCategories);
	}

}