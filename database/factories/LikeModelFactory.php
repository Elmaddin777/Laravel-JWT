<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LikeModel;
use Faker\Generator as Faker;
use App\User;

$factory->define(LikeModel::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
