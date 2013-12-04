<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_food_product_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('main_image');
			$table->text('brand_message_heading_prefix');
			$table->text('brand_message');
			$table->text('description');
			$table->string('stockist_image');
			$table->text('page_title');
			$table->text('meta_description');
			$table->text('meta_keywords');
			$table->enum('status', array('DRAFT','APPROVED'))->default('DRAFT');
			$table->dateTime('published_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fbf_food_product_categories');
	}

}
