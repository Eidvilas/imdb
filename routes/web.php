<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@index');
Route::get('/movies', 'PagesController@movies');
Route::get('/categories', 'PagesController@categories');
Route::get('/actors', 'PagesController@actors');
Route::get('/admin', 'PagesController@admin');


Route::resource('/movie', 'MovieController');
Route::resource('/categorie', 'CategoriesController');
Route::resource('/actor', 'ActorsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::middleware('guest')->group(function() {
    Route::get('/fb/login', 'FacebookController@redirect')->name('facebook.redirect');
    Route::get('/fb/callback', 'FacebookController@callback')->name('facebook.callback');
//});

