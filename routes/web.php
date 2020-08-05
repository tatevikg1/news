<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('is.editor');
Route::post('register', 'Auth\RegisterController@register')->middleware('is.editor');

Route::middleware('auth')->group(function(){
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});

Route::prefix('articles')->group(function(){

    Route::get  ('/create',         'ReporterController@create')    ->name('articles.create');
    Route::post ('/',               'ReporterController@store')     ->name('articles.store');
    Route::get  ('/',               'ReporterController@index')     ->name('articles.index');
    Route::get  ('/{article}/edit', 'ReporterController@edit')      ->name('articles.edit');
    Route::put  ('/{article}',      'ReporterController@update')    ->name('articles.update');
    Route::delete ('/{article}',    'ReporterController@destroy')   ->name('articles.delete');
    Route::get('/articles/{{ $article->id }}/send', function(){

    });
});

Route::prefix('editor')->middleware('is.editor')->group(function(){


});
