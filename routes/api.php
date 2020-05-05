<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CRUDs
Route::apiResource('/question', 'QuestionController');
Route::apiResource('/category', 'CatController');
Route::apiResource('question/{question}/reply', 'ReplyController');

// Like system
Route::post('reply/{reply}', 'LikeController@likeIt');
Route::delete('reply/{reply}', 'LikeController@unlikeIt');

// Auth
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});