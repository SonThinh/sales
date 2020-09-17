<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use App\Model\Post;
use App\Model\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'     => User::all()->random(1)->first()->id,
        'category_id' => Category::all()->random(1)->first()->id,
        'title'       => $faker->slug,
        'description' => $faker->text,
    ];
});
