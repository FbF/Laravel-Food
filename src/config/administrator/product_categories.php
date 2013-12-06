<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Product Categories',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'category',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelFood\ProductCategory',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name',
			'sortable' => false,
		),
		'order' => array(
			'title' => 'Order',
			'sortable' => false,
		),
		'published_date' => array(
			'title' => 'Published',
			'sortable' => false,
		),
		'status' => array(
			'title' => 'Status',
			'select' => "CASE (:table).status WHEN '".Fbf\LaravelFood\BaseModel::APPROVED."' THEN 'Approved' WHEN '".Fbf\LaravelFood\BaseModel::DRAFT."' THEN 'Draft' END",
			'sortable' => false,
		),
		'updated_at' => array(
			'title' => 'Last Updated',
			'sortable' => false,
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'slug' => array(
			'title' => 'Slug',
			'type' => 'text',
			'visible' => function($model)
				{
					return $model->exists;
				},
		),
		'order' => array(
			'title' => 'Order that this category is shown in, lowest number first',
			'type' => 'number',
		),
		'main_image' => array(
			'title' => 'Main Image',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-food::images.product_categories.main.original.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::images.product_categories.main.resized.width'),
					Config::get('laravel-food::images.product_categories.main.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.product_categories.main.resized.dir'),
					100
				),
			),
			'visible' => function($model)
				{
					return Config::get('laravel-food::fields.product_categories.main_image');
				},
		),
		'brand_message_heading_prefix' => array(
			'title' => 'Brand Message Heading Prefix (The text that goes before the Product Category Name in the brand message area on the Product Category detail page)',
			'type' => 'textarea',
			'limit' => 200,
			'height' => 70,
			'visible' => function($model)
				{
					return Config::get('laravel-food::fields.product_categories.brand_message_heading_prefix');
				},
		),
		'brand_message' => array(
			'title' => 'Brand Message (The text that appears under the Brand Message Heading on the Product Category detail page)',
			'type' => 'textarea',
			'limit' => 400,
			'height' => 140,
			'visible' => function($model)
				{
					return Config::get('laravel-food::fields.product_categories.brand_message_heading_prefix');
				},
		),
		'description' => array(
			'title' => 'Description (The text that appears under the Brand Message area, and above the product listing on the Product Category detail page)',
			'type' => 'wysiwyg',
		),
		'stockist_image' => array(
			'title' => 'Stockist Image (The image that represents all products in this category on the stockists page)',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-food::product_categories.images.stockist.original_dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::images.product_categories.stockist.resized.width'),
					Config::get('laravel-food::images.product_categories.stockist.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.product_categories.stockist.resized.dir'),
					100
				),
			),
			'visible' => function($model)
				{
					return Config::get('laravel-food::fields.product_categories.stockist_image');
				},
		),
		'page_title' => array(
			'title' => 'Page Title',
			'type' => 'text',
		),
		'meta_description' => array(
			'title' => 'Meta Description',
			'type' => 'textarea',
		),
		'meta_keywords' => array(
			'title' => 'Meta Keywords',
			'type' => 'textarea',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelFood\BaseModel::DRAFT => 'Draft',
				Fbf\LaravelFood\BaseModel::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'datetime',
			'date_format' => 'yy-mm-dd', //optional, will default to this value
			'time_format' => 'HH:mm',    //optional, will default to this value
		),
		'created_at' => array(
			'title' => 'Created',
			'type' => 'datetime',
			'editable' => false,
		),
		'updated_at' => array(
			'title' => 'Updated',
			'type' => 'datetime',
			'editable' => false,
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Name',
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'date',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelFood\BaseModel::DRAFT => 'Draft',
				Fbf\LaravelFood\BaseModel::APPROVED => 'Approved',
			),
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'order',
		'direction' => 'asc',
	),

	/**
	 * If provided, this is run to construct the front-end link for your model
	 *
	 * @type function
	 */
	'link' => function($model)
		{
			return $model->getUrl();
		},


);