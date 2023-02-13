<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::prefix('categories')->group(function () {
    Route::get('/create', [
        'as' => 'categories.create',
        'uses'=> 'CategoryController@create'
    ]);
    Route::get('/show', [
        'as' => 'categories.show',
        'uses'=> 'CategoryController@show'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses'=> 'CategoryController@store'
    ]);
});