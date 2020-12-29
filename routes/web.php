<?php

use Illuminate\Support\Facades\Route;


// staff login
Route::get  ('login',   'Auth\LoginController@showLoginForm')->name('login');
Route::post ('login',   'Auth\LoginController@login');
Route::post ('logout',  'Auth\LoginController@logout')->name('logout');

// editor registers peporters, all articles, themes(create)
Route::middleware('is.editor')->group(function(){
    Route::get  ('register',        'Auth\RegisterController@showRegistrationForm');
    Route::post ('register',        'Auth\RegisterController@register');
    Route::get  ('/reporters',      'EditorController@reporters')->name('editor.reporters');
    Route::get  ('/all_articles',   'EditorController@index')    ->name('editor.index');
    Route::get  ('/theme/create',   'ThemeController@create')    ->name('theme.create');
    Route::post ('/theme',          'ThemeController@store')     ->name('theme.store');
    Route::get  ('/theme',          'ThemeController@index')     ->name('theme.index');
    Route::get  ('/theme/{theme}',  'ThemeController@destroy')   ->name('theme.delete');
});

// edit staff profile (user data)
Route::middleware('auth')->group(function(){
    Route::get  ('/profile/edit',         'Auth\EditProfileController@showEditForm');
    Route::post ('/profile/edit',         'Auth\EditProfileController@update');
});


// reporters work with articles
Route::prefix('articles')->group(function(){
    Route::get  ('/create',         'ArticleController@create')    ->name('article.create');
    Route::post ('/',               'ArticleController@store')     ->name('article.store');
    Route::get  ('/',               'ArticleController@index')     ->name('article.index');
    Route::get  ('/{article}/edit', 'ArticleController@edit')      ->name('article.edit');
    Route::get  ('/{article}',      'ArticleController@show')      ->name('article.show');
    Route::put  ('/{article}',      'ArticleController@update')    ->name('article.update');
    Route::delete ('/{article}',    'ArticleController@destroy')   ->name('article.delete');
});

//routes for audience (people who read articles)
Route::get('/',                 'HomeController@index');
Route::get('/home',             'HomeController@index')->name('home');
Route::get('/themes/{theme}',   'HomeController@filter');
Route::get('/staff',            'HomeController@staff');
Route::get('/about',            'HomeController@about');
Route::get('/{article}',        'HomeController@show')->name('article');


// component controllers routes
Route::middleware('auth')->group(function(){
    Route::post('send/{article}',       'SendController@update');
    Route::post('publish/{article}',    'PublishController@update');
});

