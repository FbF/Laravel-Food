<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Recipe Categories',

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
	'model' => 'Fbf\LaravelFood\RecipeCategory',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name'
		),
		'order' => array(
			'title' => 'Order'
		),
		'published_date' => array(
			'title' => 'Published'
		),
		'status' => array(
			'title' => 'Status',
			'select' => "CASE (:table).status WHEN '".Fbf\LaravelFood\BaseModel::APPROVED."' THEN 'Approved' WHEN '".Fbf\LaravelFood\BaseModel::DRAFT."' THEN 'Draft' END",
		),
		'updated_at' => array(
			'title' => 'Last Updated'
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
			'location' => public_path() . Config::get('laravel-food::images.recipe_categories.main.original.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::images.recipe_categories.main.resized.width'),
					Config::get('laravel-food::images.recipe_categories.main.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.recipe_categories.main.resized.dir'),
					100
				),
			),
		),
		'description' => array(
			'title' => 'Description (shown under the category name on the recipes page and as the brand message heading on the recipe index page for this category) (max 100 characters)',
			'type' => 'textarea',
			'height' => 70,
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
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'name' => 'required',
		'slug' => 'alpha_dash',
		'main_image' => 'required|image',
		'description' => 'required',
		'order' => 'required|integer',
		'page_title' => '',
		'meta_description' => '',
		'meta_keywords' => '',
		'status' => 'required|in:'.Fbf\LaravelFood\BaseModel::DRAFT.','.Fbf\LaravelFood\BaseModel::APPROVED,
		'published_date' => 'required|date',
	),

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'updated_at',
		'direction' => 'desc',
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