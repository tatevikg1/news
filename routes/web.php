<?php

use Illuminate\Support\Facades\Route;

//routes for audience (people who read articles)
Route::get('/',                 'HomeController@index');
Route::get('/home',             'HomeController@index')->name('home');
Route::get('/themes/{theme}',   'HomeController@filter');
Route::get('/staff',            'HomeController@staff');
Route::get('/about',            'HomeController@about');
Route::get('/{article}',        'HomeController@show')->name('article');


// staff login
Route::get  ('login',   'Auth\LoginController@showLoginForm')->name('login');
Route::post ('login',   'Auth\LoginController@login');
Route::post ('logout',  'Auth\LoginController@logout')->name('logout');

// editor registers peporters
Route::middleware('is.editor')->group(function(){
    Route::get  ('register',        'Auth\RegisterController@showRegistrationForm');
    Route::post ('register',        'Auth\RegisterController@register');
    Route::get  ('/reporters',      'EditorController@reporters')->name('editor.reporters');
    Route::get  ('/all_articles',   'EditorController@index')->name('editor.index');
});

// edit staff profile (user data)
Route::middleware('auth')->group(function(){
    Route::get  ('/profile/edit',         'Auth\EditProfileController@showEditForm');
    Route::post ('/profile/edit',         'Auth\EditProfileController@update');
});


// reporters work with articles
Route::prefix('articles')->group(function(){
    Route::get  ('/create',         'ReporterController@create')    ->name('articles.create');
    Route::post ('/',               'ReporterController@store')     ->name('articles.store');
    Route::get  ('/',               'ReporterController@index')     ->name('articles.index');
    Route::get  ('/{article}/edit', 'ReporterController@edit')      ->name('articles.edit');
    Route::get  ('/{article}',      'ReporterController@show')      ->name('articles.show');
    Route::put  ('/{article}',      'ReporterController@update')    ->name('articles.update');
    Route::delete ('/{article}',    'ReporterController@destroy')   ->name('articles.delete');

});

// component controllers routes
Route::middleware('auth')->group(function(){
    Route::post('/send/{article}',       'SendController@update');
    Route::post('/publish/{article}',    'PublishController@update');
});

