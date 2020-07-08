<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Get;
use Faker\Generator as Faker;

$factory->define(Get::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence(),
        'slug'=> \Str::slug($faker->sentence()),
        'body' => $faker->paragraph(10),

        //php artisan tinker 
        //factory('App\Get', 10)->create();

    ];
});
