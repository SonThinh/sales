<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function () {

    $key = array_rand(Config('contrants.CATEGORY'));

    return [
        'name' => Config('contrants.CATEGORY')[$key],
    ];
});
