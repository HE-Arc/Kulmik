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

//  Home
Route::get('/', function () {
    return view('welcome');
});

//  Authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//  Containes
Route::get('/containers', 'CupboardController@index');
//Route::get('/containers/{container}', 'ContainerController@show');

//  Food
Route::get('/food', 'FoodController@index');
Route::get('/food/{food}', 'FoodController@show');

//  Categories
//Route::get('/category', 'CategoryController@index');
Route::get('/category', 'CategoryController@show');

//  Recipes
//TODO 2nd iteration, use controller instead
Route::get('/recipes', function () {
    return redirect('/');
});

//  About
Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});
