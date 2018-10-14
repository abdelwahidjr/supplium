<?php

Route::group(['prefix' => 'product-directory'] , function ()
{

    Route::get('/all' , 'ProductDirectoryController@all');

    Route::post('/' , 'ProductDirectoryController@store');

    Route::post('/{id}' , 'ProductDirectoryController@update')->where('id' , '[0-9]+');

    Route::get('/{id}' , 'ProductDirectoryController@show')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'ProductDirectoryController@destroy')->where('id' , '[0-9]+');

    Route::post('/directory' , 'ProductDirectoryController@directory');

    Route::get('/sort/{type}' , 'ProductDirectoryController@SortProductsDirectories');

});


