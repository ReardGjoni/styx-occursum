<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Attending;
use Faker\Generator as Faker;

$factory->define(Attending::class, function (Faker $faker) {
    return [
        'meetup_id' => rand(1, 50),
        'user_id' => rand(1, 50)
    ];
});
