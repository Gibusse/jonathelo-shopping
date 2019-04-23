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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/shoes', 'ShoesController@index')->name('shoes');
Route::get('/women', 'WomenController@index')->name('women');
Route::get('/men', 'MenController@index')->name('men');
Route::get('/children', 'ChildrenController@index')->name('children');

Route::get('/contact', function() {
   return view('layouts.contact');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/logout', 'LogOutController@index')->name('logout')->middleware('auth');

/**
 *  Routes for categories and products
 */

Route::resources([
    '/categories' => 'AdminCategoryController',
    '/products' => 'AdminProductController'
]);



/**
 *  Route fallback
 *  when no other route matches the incoming request
 */

Route::fallback(function() {

    return view('welcome');
});
