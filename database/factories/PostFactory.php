<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Post;
use App\Model\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'     => User::all()->random(1)->first()->id,
        'category_id' => Model\Category::all()->random(1)->first()->id,
        'title'       => $faker->slug,
        'description' => $faker->text,
    ];
});
