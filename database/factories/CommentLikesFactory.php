<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CommentLikes;
use Faker\Generator as Faker;

$factory->define(CommentLikes::class, function (Faker $faker) {
    return [
        'comment_id' => rand(1, 100),
        'liked_from' => rand(1, 50),
    ];
});
