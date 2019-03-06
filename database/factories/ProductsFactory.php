<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {

  $brands = \App\Brand::all();
	$categories = \App\Category::all();

    return [
      "name" => $faker->catchPhrase(),
      "stock" => $faker->numberBetween(0, 100),
      "price" => $faker->randomFloat(2, 0, 1000),
      "category_id" => $categories->shuffle()->first()->id,
      "brand_id" => $brands->shuffle()->first()->id
    ];
});
