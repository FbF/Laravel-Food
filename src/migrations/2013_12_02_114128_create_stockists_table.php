<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_food_stockists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('logo');
			$table->string('rotated_logo');
			$table->tinyInteger('order');
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
		Schema::drop('fbf_food_stockists');
	}

}
