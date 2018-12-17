<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        "avatar" => null,
        "avatar_original" => null,
        "name" => $faker->name,
        "lastname" => $faker->lastname,
        "email" => $faker->email,
        "password" => bcrypt(123456),
        "site" => route("index"),
        "role_id" => 3,
        "location"  => $faker->country,
        "profession" => "User",
    ];
});
