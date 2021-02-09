<?php

use Illuminate\Support\Facades\Route;

// staff login
Route::get  ('login',   'Auth\LoginController@showLoginForm')->name('login');
Route::post ('login',   'Auth\LoginController@login');
Route::post ('logout',  'Auth\LoginController@logout')->name('logout');


//routes for audience (people who read articles)
Route::get('/',                 'HomeController@index')         ->name('audience.index');
Route::get('/theme/{slug}',     'HomeController@filter')        ->name('audience.theme');
Route::get('/staff',            'HomeController@staff')         ->name('audience.staff');
Route::get('/about',            'HomeController@about')         ->name('audience.about');
Route::get('/article/{article}',        'HomeController@show')  ->name('audience.article');

// editor registers peporters, all articles, themes(create)
Route::middleware('is.editor')->group(function(){
    Route::get  ('register',        'Auth\RegisterController@showRegistrationForm');
    Route::post ('register',        'Auth\RegisterController@register');

    Route::get  ('/editor',                'EditorController@index')    ->name('editor.index');
    Route::get  ('/editor/reporters',      'EditorController@reporters')->name('editor.reporter');
    Route::get  ('/editor/theme/create',   'ThemeController@create')    ->name('theme.create');
    Route::post ('/editor/theme',          'ThemeController@store')     ->name('theme.store');
    Route::get  ('/editor/theme',          'ThemeController@index')     ->name('theme.index');
    Route::get  ('/editor/theme/{theme}',  'ThemeController@destroy')   ->name('theme.delete');
});

// edit staff profile (user data)
Route::middleware('auth')->group(function(){
    Route::get  ('/profile/edit',         'Auth\EditProfileController@showEditForm');
    Route::post ('/profile/update',       'Auth\EditProfileController@update');
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

// component controllers routes
Route::middleware('auth')->group(function(){
    Route::post('send/{article}',       'VuejsController@send');
    Route::post('publish/{article}',    'VuejsController@publish');
});

