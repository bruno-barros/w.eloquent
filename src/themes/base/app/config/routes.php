<?php
use Illuminate\Support\Facades\Route;

Route::get('/laravel', 'App\Controllers\HomeController@getIndex');
Route::get('/sem-categoria/{name}', 'App\Controllers\HomeController@getIndex');
Route::post('/submit', 'App\Controllers\HomeController@postIndex');
