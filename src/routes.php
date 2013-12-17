<?php

Route::get(Config::get('laravel-food::uri.products'), 'Fbf\LaravelFood\ProductCategoriesController@index');
Route::post(Config::get('laravel-food::uri.products'), 'Fbf\LaravelFood\ProductCategoriesController@redirector');

Route::get(Config::get('laravel-food::uri.products').'/{productCategorySlug}', 'Fbf\LaravelFood\ProductCategoriesController@view');

Route::get(Config::get('laravel-food::uri.products').'/{productCategorySlug}/{productSlug}', 'Fbf\LaravelFood\ProductsController@view');

Route::get(Config::get('laravel-food::uri.recipes'), 'Fbf\LaravelFood\RecipeCategoriesController@index');
Route::post(Config::get('laravel-food::uri.recipes'), 'Fbf\LaravelFood\RecipeCategoriesController@redirector');

Route::get(Config::get('laravel-food::uri.recipes').'/category/{recipeCategorySlug}', 'Fbf\LaravelFood\RecipesController@indexByCategory');

Route::get(Config::get('laravel-food::uri.recipes').'/product/{productSlug}', 'Fbf\LaravelFood\RecipesController@indexByProduct');

Route::get(Config::get('laravel-food::uri.recipes').'/{recipeCategorySlug}/{recipeSlug}', 'Fbf\LaravelFood\RecipesController@view');

Route::get(Config::get('laravel-food::uri.stockists'), 'Fbf\LaravelFood\ProductsController@stockists');

View::composer('laravel-food::partials.product_categories_nav', 'Fbf\LaravelFood\ProductCategoriesNavComposer');
View::composer('laravel-food::partials.recipe_categories_nav', 'Fbf\LaravelFood\RecipeCategoriesNavComposer');
View::composer('laravel-food::partials.recipe_products_tag_cloud', 'Fbf\LaravelFood\RecipeProductsTagCloudComposer');
