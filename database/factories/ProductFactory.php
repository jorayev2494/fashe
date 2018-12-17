<?php

use Faker\Generator as Faker;

/**
 *  Фейкер для Товаров
*/

// factory(App\User::class)->make()

$factory->define(App\Product::class, function (Faker $faker) {
    // $faker->create('Ru_RU');
    // $faker = Faker::create('Ru_RU');            // Russian

    $image["img_1"] = $faker->image(public_path("fashe") . "/products/", 720, 960, "cats", false, true);

    return [
        'name' => $faker->company,
        'img' => json_encode($image),
        'category_id' => 2, // secret
        'price' => 250,
        'size' => 2,
        'count' => 5,
        'color' => $faker->rgbcolor(),
        'status_id' => 2,
        'description' => $faker->realText(200),
        'active' => true,
    ];
});
