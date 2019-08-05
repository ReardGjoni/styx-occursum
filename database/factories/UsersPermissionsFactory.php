<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UsersPermissions;
use Faker\Generator as Faker;

$factory->define(UsersPermissions::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 50),
        'permission_id' => rand(1, 6),
    ];
});

