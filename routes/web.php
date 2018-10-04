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
/*
// React Web Route
Route::get('/{react_route?}' , function ()
{
    return view('frontend');
})->where('react_route' , '[\/\w\.-]*');*/


Auth::routes();

Route::get('/' , 'HomeController@welcome')->name('welcome');

Route::get('/home' , 'HomeController@home')->name('home');

Route::get('/test' , 'HomeController@test');

