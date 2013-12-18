<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Stockists',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'stockist',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelFood\Stockist',

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
		'order' => array(
			'title' => 'Order that this stockist is shown in, lowest number first',
			'type' => 'number',
		),
		'logo' => array(
			'title' => 'Logo',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-food::stockists.images.logo.originals.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::stockists.images.logo.resized.width'),
					Config::get('laravel-food::stockists.images.logo.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::stockists.images.logo.resized.dir'),
					100
				),
			),
		),
		'rotated_logo' => array(
			'title' => 'Rotated Logo',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-food::stockists.images.rotated_logo.originals.dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-food::stockists.images.rotated_logo.resized.width'),
					Config::get('laravel-food::stockists.images.rotated_logo.resized.height'),
					'crop',
					public_path() . Config::get('laravel-food::stockists.images.rotated_logo.resized.dir'),
					100
				),
			),
		),
		'products' => array(
			'title' => 'Products',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'name',
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
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'name' => 'required',
		'order' => 'required|integer',
		'logo' => 'required|image',
		'rotated_logo' => 'required|image',
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


);