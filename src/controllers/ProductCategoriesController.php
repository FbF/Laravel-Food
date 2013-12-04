<?php namespace Fbf\LaravelFood;

class ProductCategoriesController extends \BaseController {

	public function index()
	{
		$productCategories = ProductCategory::live()->orderBy('name', 'asc')->get();
		return \View::make(\Config::get('laravel-food::product_categories.views.index'))->with(compact('productCategories'));
	}

	public function view($productCategorySlug)
	{
		$productCategory = ProductCategory::live()->where('slug', '=', $productCategorySlug)->first();
		$products = Product::live()->where('product_category_id', '=', $productCategory->id)->orderBy('name', 'asc')->get();
		return \View::make(\Config::get('laravel-food::product_categories.views.view'))->with(compact('productCategory', 'products'));
	}

}