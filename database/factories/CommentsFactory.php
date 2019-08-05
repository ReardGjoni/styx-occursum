<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comments;
use Faker\Generator as Faker;

$factory->define(Comments::class, function (Faker $faker) {
    return [
        'comment' => $faker->text(30),
        'meetup_id' => rand(1, 50),
        'from_user' => rand(1, 50)
    ];
});
