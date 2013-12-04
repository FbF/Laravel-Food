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
			'index' => 'laravel-food::product_categories_index',
			'view'  => 'laravel-food::product_category_view',
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
			'view'  => 'laravel-food::product_view',
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
			'index'  => 'laravel-food::recipes_index',
			'view'  => 'laravel-food::recipe_view',
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