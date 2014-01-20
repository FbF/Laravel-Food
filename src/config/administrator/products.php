<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Products',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'product',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelFood\Product',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'productCategory' => array(
			'title' => 'Product Category',
			'relationship' => 'productCategory',
			'select' => '(:table).name',
		),
		'name' => array(
			'title' => 'Name'
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
		'productCategory' => array(
			'title' => 'Product Category',
			'type' => 'relationship'
		),
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
		'main_image' => array(
			'title' => 'Main Image',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-food::images.products.main.original.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::images.products.main.resized.width'),
					Config::get('laravel-food::images.products.main.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.products.main.resized.dir'),
					100
				),
				array(
					Config::get('laravel-food::images.products.main.thumbnail.width'),
					Config::get('laravel-food::images.products.main.thumbnail.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.products.main.thumbnail.dir'),
					100
				),
			),
		),
		'summary' => array(
			'title' => 'Summary (The text that appears with the product entry when viewing a product category) (max 200 characters)',
			'type' => 'textarea',
		),
		'description' => array(
			'title' => 'Description (The text that appears at the top of the Product detail page)',
			'type' => 'wysiwyg',
		),
		'sizes' => array(
			'title' => 'Sizes (e.g. "190g / 350g")',
			'type' => 'text',
		),
		'serves' => array(
			'title' => 'Serves (number of people, e.g. 4)',
			'type' => 'number',
		),
		'prep_time' => array(
			'title' => 'Prep Time (minutes, e.g. 10)',
			'type' => 'number',
		),
		'cook_time' => array(
			'title' => 'Cook Time (minutes, e.g. 15)',
			'type' => 'number',
		),
		'teaspoon_equivalent' => array(
			'title' => 'Teaspoon Equivalent (e.g. "1 clove of garlic.")',
			'type' => 'text',
		),
		'use_within' => array(
			'title' => 'Use Withing (e.g. "1 week.")',
			'type' => 'number',
		),
		'stockists' => array(
			'title' => 'Stockists',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
		),
		'recipes' => array(
			'title' => 'Recipes',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
		),
		'ingredients' => array(
			'title' => 'Ingredients',
			'type' => 'wysiwyg',
		),
		'nutritional_info' => array(
			'title' => 'Nutritional Info',
			'type' => 'wysiwyg',
		),
		'allergen_info' => array(
			'title' => 'Allergen Info, e.g. "Sulphites"',
			'type' => 'text',
		),
		'suit_coeliacs' => array(
			'title' => 'Suitable for Coeliacs',
			'type' => 'bool',
		),
		'suit_veggies' => array(
			'title' => 'Suitable for Vegetarians and Vegans',
			'type' => 'bool',
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
		'productCategory' => array(
			'title' => 'Product Category',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'name' => array(
			'title' => 'Name',
		),
		'stockists' => array(
			'title' => 'Stockists',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
		),
		'recipes' => array(
			'title' => 'Recipes',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
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
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'product_category_id' => 'required|integer',
		'name' => 'required',
		'slug' => 'alpha_dash',
		'main_image' => 'required|image',
		'summary' => 'required|max:200',
		'description' => 'required',
		'sizes' => 'required|max:30',
		'serves' => 'required|integer',
		'prep_time' => 'required|integer',
		'cook_time' => 'required|integer',
		'ingredients' => 'required',
		'nutritional_info' => 'required',
		'allergen_info' => 'max:50',
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