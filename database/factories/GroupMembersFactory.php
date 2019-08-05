<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\GroupMembers;
use Faker\Generator as Faker;

$factory->define(GroupMembers::class, function (Faker $faker) {
    return [
        /*'group_id' => factory(Groups::class),
        'user_id' => factory(User::class)*/
        'group_id' => rand(1, 20),
        'user_id' => rand(1, 50)
    ];
});
