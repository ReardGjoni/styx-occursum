<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Groups;
use Faker\Generator as Faker;

$factory->define(Groups::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true)
    ];
});

