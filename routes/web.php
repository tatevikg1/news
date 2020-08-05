<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::prefix('articles')->group(function(){

    Route::get  ('/create',     'ReporterController@create')    ->name('articles.create');
    Route::post ('/',           'ReporterController@store')     ->name('articles.store');
    Route::get  ('/',           'ReporterController@index')     ->name('articles.index');
    Route::get  ('/{article}/edit', 'ReporterController@edit')  ->name('articles.edit');
    Route::put  ('/{article}',  'ReporterController@update')    ->name('articles.update');


});
