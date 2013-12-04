<?php namespace Fbf\LaravelFood;

class ProductsController extends \BaseController {

	public function view($productCategorySlug, $productSlug)
	{
		$product = Product::with(array(
				'stockists',
				'productCategory' => function($query) use ($productCategorySlug)
					{
						$query->where('slug', '=', $productCategorySlug);
					},
				'recipes' => function($query)
					{
						$query->orderBy(\DB::raw('RAND()'))
							->take(3);
					}
			))
			->where('slug', '=', $productSlug)
			->live()
			->first();

		if (!$product)
		{
			\App::abort(404);
		}

		return \View::make(\Config::get('laravel-food::products.views.view'))->with(compact('product'));
	}

	public function stockists()
	{
		return \View::make(\Config::get('laravel-food::products.views.stockists'));
	}

}