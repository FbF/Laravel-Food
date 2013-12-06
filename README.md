Laravel Food
============

A Laravel 4 Package for websites for manufacturers of food based products, with multiple product categories, products, recipes and stockists

## Pages

* Product categories index
* Product category detail, showing index of products
* Product detail page
* Recipe category index
* Recipe category detail, showing index of recipes
* Recipes by product detail, showing index of recipes (accessible through a product tag cloud)
* Recipe detail page
* Stockists page

## Installation

Add the following to you composer.json file

    "fbf/laravel-food": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelFood\LaravelFoodServiceProvider'

Run the package migration

    php artisan migrate --package=fbf/laravel-food

Publish the config

    php artisan config:publish fbf/laravel-food

Create the relevant image upload directories that you specify in your config, e.g.

    public/uploads/packages/fbf/laravel-food/product_categories/main/original
    public/uploads/packages/fbf/laravel-food/product_categories/main/resized
    public/uploads/packages/fbf/laravel-food/product_categories/stockist/original
    public/uploads/packages/fbf/laravel-food/products/main/original
    public/uploads/packages/fbf/laravel-food/products/main/resized
    public/uploads/packages/fbf/laravel-food/products/main/thumbnail
    public/uploads/packages/fbf/laravel-food/recipe_categories/main/original
    public/uploads/packages/fbf/laravel-food/recipe_categories/main/resized
    public/uploads/packages/fbf/laravel-food/recipes/main/original
    public/uploads/packages/fbf/laravel-food/recipes/main/large
    public/uploads/packages/fbf/laravel-food/recipes/main/medium
    public/uploads/packages/fbf/laravel-food/recipes/main/small
    public/uploads/packages/fbf/laravel-food/stockists/logo/original
    public/uploads/packages/fbf/laravel-food/stockists/logo/resized

## Configuration

Check out the 2 configuration files for the options, these are:

    src/config/config.php
    src/config/images.php

## Administrator

You can use the excellent Laravel Administrator package by FrozenNode to administer your blog.

http://administrator.frozennode.com/docs/installation

Several ready-to-use model config files for the models are provided in the src/config/administrator directory of the package, which you can copy into the app/config/administrator directory (or whatever you set as the model_config_path in the administrator config file).