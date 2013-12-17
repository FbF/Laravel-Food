<?php namespace Fbf\LaravelFood;

class ProductCategoriesNavComposer {

	public function compose($view)
	{
		$productCategories = ProductCategory::live()->get();
		$items = array();
		foreach ($productCategories as $productCategory)
		{
			$items[$productCategory->getUrl()] = $productCategory->name;
		}
		$view->with('productCategories', $items);
	}

}