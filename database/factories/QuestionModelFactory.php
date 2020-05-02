<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuestionModel;
use Faker\Generator as Faker;
use App\User;
use App\Models\CatModel as Cat;

$factory->define(QuestionModel::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text,
        'cat_id' => function(){
            return Cat::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
