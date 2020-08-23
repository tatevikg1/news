<?php

use Illuminate\Support\Facades\Route;




// staff login
Route::get  ('login',   'Auth\LoginController@showLoginForm')->name('login');
Route::post ('login',   'Auth\LoginController@login');
Route::post ('logout',  'Auth\LoginController@logout')->name('logout');

// editor registers peporters
Route::middleware('is.editor')->group(function(){
    Route::get  ('register',    'Auth\RegisterController@showRegistrationForm');
    Route::post ('register',    'Auth\RegisterController@register');
    Route::get ('/reporters', 'EditorController@reporters')->name('editor.reporters');
    Route::get ('/all_articles', 'EditorController@index');
});

// password reset for staff
Route::middleware('auth')->group(function(){
    Route::get  ('password/reset',          'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post ('password/email',          'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get  ('password/reset/{token}',  'Auth\ResetPasswordController@showResetForm');
    Route::post ('password/reset',          'Auth\ResetPasswordController@reset');
});


// reporters work with articles
Route::prefix('articles')->group(function(){
    Route::get  ('/create',         'ReporterController@create')    ->name('articles.create');
    Route::post ('/',               'ReporterController@store')     ->name('articles.store');
    Route::get  ('/',               'ReporterController@index')     ->name('articles.index');
    Route::get  ('/{article}/edit', 'ReporterController@edit')      ->name('articles.edit');
    Route::put  ('/{article}',      'ReporterController@update')    ->name('articles.update');
    Route::delete ('/{article}',    'ReporterController@destroy')   ->name('articles.delete');

});

// component controllers routes
Route::middleware('auth')->group(function(){
    Route::post('/send/{article}',      'SendController@update');
    Route::post('/publish/{article}',    'PublishController@update');
});


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{article}','HomeController@show')->name('article');
Route::get('/themes/{theme}', 'HomeController@filter');
