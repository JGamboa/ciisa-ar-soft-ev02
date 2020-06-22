<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Producto::class, function (Faker $faker) {
    return [
        'nombreProd' => mb_substr($faker->sentence(2, false), 0, 20),
        'precioProd' => $faker->randomNumber()
    ];
});
