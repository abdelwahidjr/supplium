<?php

Route::group(['prefix' => 'category'] , function ()
{

    Route::get('/all' , 'CategoryController@all');

    Route::post('/' , 'CategoryController@store');

    Route::get('/{id}' , 'CategoryController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'CategoryController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'CategoryController@destroy')->where('id' , '[0-9]+');

});


