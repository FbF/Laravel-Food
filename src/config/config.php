<?php

return array(

	'uri' => array(
		'products' => 'range',
		'recipes' => 'recipes',
		'stockists' => 'stockists',
	),

	'fields' => array(
		'product_categories' => array(
			'main_image' => true,
			'brand_message_heading_prefix' => true,
			'brand_message' => true,
			'stockist_image' => true,
		),
	),

	'views' => array(
		'product_categories' => array(
			'index' => 'laravel-food::product_categories.index',
			'view'  => 'laravel-food::product_categories.view',
		),
		'products' => array(
			'view'  => 'laravel-food::products.view',
			'stockists'  => 'laravel-food::products.stockists',
		),
		'recipe_categories' => array(
			'index'  => 'laravel-food::recipe_categories.index',
		),
		'recipes' => array(
			'index'  => 'laravel-food::recipes.index',
			'view'  => 'laravel-food::recipes.view',
		),
	),

);