<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_food_recipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('recipe_category_id');
			$table->string('name');
			$table->string('slug');
			$table->string('main_image');
			$table->text('description');
			$table->tinyInteger('serves');
			$table->tinyInteger('prep_time');
			$table->tinyInteger('cook_time');
			$table->text('nutritional_info');
			$table->text('ingredients');
			$table->text('method');
			$table->integer('other_recipe_1');
			$table->integer('other_recipe_2');
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
		Schema::drop('fbf_food_recipes');
	}

}
