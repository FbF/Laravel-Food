<?php

return array(

	'uri' => array(
		'products' => 'range',
		'recipes' => 'recipes',
		'stockists' => 'stockists',
	),

	'fields' => array(
		'main_image' => true,
		'brand_message_heading_prefix' => true,
		'brand_message' => true,
		'stockist_image' => true,
	),

	'product_categories' => array(
		'views' => array(
			'index' => 'laravel-food::product_categories.index',
			'view'  => 'laravel-food::product_categories.view',
		),
		'images' => array(
			'main' => array(
				'originals_dir' => '/uploads/packages/fbf/laravel-food/product_categories/originals/',
				'thumbnails_dir' => '/uploads/packages/fbf/laravel-food/product_categories/thumbnails/',
				'thumbnails_width' => '200',
				'thumbnails_height' => '150',
			),
		),
	),

	'products' => array(
		'views' => array(
			'view'  => 'laravel-food::products.view',
			'stockists'  => 'laravel-food::products.stockists',
		),
		'images' => array(
			'main' => array(
				'originals_dir' => '/uploads/packages/fbf/laravel-food/product_categories/originals/',
				'thumbnails_dir' => '/uploads/packages/fbf/laravel-food/product_categories/thumbnails/',
				'thumbnails_width' => '200',
				'thumbnails_height' => '150',
			),
		),
	),

	'recipes' => array(
		'views' => array(
			'index'  => 'laravel-food::recipes.index',
			'view'  => 'laravel-food::recipes.view',
		),
		'images' => array(
			'main' => array(
				'originals_dir' => '/uploads/packages/fbf/laravel-food/recipes/originals/',
				'thumbnails_dir' => '/uploads/packages/fbf/laravel-food/recipes/thumbnails/',
				'thumbnails_width' => '200',
				'thumbnails_height' => '150',
			),
		),
	),
);