<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/create', 'ReporterController@create')->name('articles.create');
Route::post('/articles', 'ReporterController@store')->name('articles.store');
Route::get('/articles', 'ReporterController@index')->name('articles.index');
