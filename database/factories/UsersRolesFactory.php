<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UsersRoles;
use Faker\Generator as Faker;

$factory->define(UsersRoles::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 50),
        'role_id' => rand(1, 3),
    ];
});
