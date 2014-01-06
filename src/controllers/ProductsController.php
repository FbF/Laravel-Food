<?php namespace Fbf\LaravelFood;

class ProductsController extends BaseController {

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

		return \View::make(\Config::get('laravel-food::views.products.view'))->with(compact('product'));
	}

	public function stockists()
	{
		$productCategories = ProductCategory::live()->with(array(
			'products' => function($query)
				{
					$query->live()->with(array(
						'stockists' => function($query)
							{
								$query->live()->orderBy('order', 'asc');
							}
					))->orderBy('name', 'asc');
				}
		))->orderBy('order', 'asc')->get();

		$stockists = Stockist::live()->with(array(
			'products' => function($query)
				{
					$query->live()->orderBy('product_category_id', 'asc')->orderBy('name', 'asc');
				}
		))->orderBy('order', 'asc')->get();

		return \View::make(\Config::get('laravel-food::views.products.stockists'))->with(compact('productCategories', 'stockists'));
	}

}