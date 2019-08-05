<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Meetups;
use Faker\Generator as Faker;

$factory->define(Meetups::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'description' => $faker->text(200),
        'place' => $faker->streetAddress(),
        'created_by' => rand(1, 50),
        'group_id' => rand(1, 20),
        'comments' => rand(1, 20),
        'time_happening' =>$faker->dateTime($max = 'now', $timezone = null)
    ];
});
