<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeaspoonAndUseByToProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fbf_food_products', function(Blueprint $table)
		{
			$table->string('teaspoon_equivalent')->after('cook_time')->nullable();
			$table->string('use_within')->after('teaspoon_equivalent')->nullable();
		});
		Schema::table('fbf_food_product_categories', function(Blueprint $table)
		{
			$table->enum('essentials_type', array(
				'SERVES_PREP_COOK',
				'TEASPOON_USE_WITHIN',
			))->after('description')->default('TEASPOON_USE_WITHIN');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fbf_food_products', function(Blueprint $table)
		{
			$table->dropColumn('teaspoon_equivalent');
			$table->dropColumn('use_within');
		});
		Schema::table('fbf_food_product_categories', function(Blueprint $table)
		{
			$table->dropColumn('essentials_type');
		});
	}

}