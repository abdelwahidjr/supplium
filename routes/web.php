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

Auth::routes();

Route::get('/' , 'HomeController@home')->name('dashboard');

Route::get('/dashboard' , 'HomeController@home')->name('dashboard');

Route::get('/test' , 'HomeController@test');

Route::prefix('admin')->group(function ()
{
    //dd(File::allFiles(base_path('routes/web/admin')));
    foreach (File::allFiles(base_path('routes/web/admin')) as $file)
    {
        require($file->getPathname());
    }
});

Route::prefix('dashboard')->group(function ()
{
    foreach (File::allFiles(base_path('routes/web/public')) as $file)
    {
        require($file->getPathname());
    }
});
