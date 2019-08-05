<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\GroupMeetups;
use Faker\Generator as Faker;

$factory->define(GroupMeetups::class, function (Faker $faker) {
    return [
        'group_id' => rand(1, 20),
        'meetup_id' => rand(1, 50)
    ];
});
