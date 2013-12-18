<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Recipes',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'recipe',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelFood\Recipe',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'recipeCategory' => array(
			'title' => 'Recipe Category',
			'relationship' => 'recipeCategory',
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
		'recipeCategory' => array(
			'title' => 'Recipe Category',
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
			'location' => public_path() . Config::get('laravel-food::images.recipes.main.original.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::images.recipes.main.large.width'),
					Config::get('laravel-food::images.recipes.main.large.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.recipes.main.large.dir'),
					100
				),
				array(
					Config::get('laravel-food::images.recipes.main.medium.width'),
					Config::get('laravel-food::images.recipes.main.medium.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.recipes.main.medium.dir'),
					100
				),
				array(
					Config::get('laravel-food::images.recipes.main.small.width'),
					Config::get('laravel-food::images.recipes.main.small.height'),
					'crop',
					public_path() . Config::get('laravel-food::images.recipes.main.small.dir'),
					100
				),
			),
		),
		'description' => array(
			'title' => 'Description',
			'type' => 'wysiwyg',
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
		'nutritional_info' => array(
			'title' => 'Nutritional Info',
			'type' => 'textarea',
			'limit' => 200,
			'height' => 80,
		),
		'ingredients' => array(
			'title' => 'Ingredients',
			'type' => 'wysiwyg',
		),
		'method' => array(
			'title' => 'Method',
			'type' => 'wysiwyg',
		),
		'products' => array(
			'title' => 'Product',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
			'editable' => false,
		),
		'otherRecipe1' => array(
			'title' => 'Other Recipe 1',
			'type' => 'relationship',
			'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
		),
		'otherRecipe2' => array(
			'title' => 'Other Recipe 2',
			'type' => 'relationship',
			'name_field' => 'name', //what column or accessor on the other table you want to use to represent this object
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
		'recipeCategory' => array(
			'title' => 'Recipe Category',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'name' => array(
			'title' => 'Name',
		),
		'products' => array(
			'title' => 'Products',
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
		'recipe_category_id' => 'required|integer',
		'name' => 'required',
		'slug' => 'alpha_dash',
		'main_image' => 'required|image',
		'description' => 'required',
		'serves' => 'required|integer',
		'prep_time' => 'required|integer',
		'cook_time' => 'required|integer',
		'ingredients' => 'required',
		'nutritional_info' => 'required',
		'method' => 'required',
		'other_recipe_1_id' => 'integer',
		'other_recipe_2_id' => 'integer',
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