<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/question', 'QuestionController');
Route::apiResource('/category', 'CatController');
Route::apiResource('question/{question}/reply', 'ReplyController');