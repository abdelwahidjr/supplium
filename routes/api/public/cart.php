<?php

Route::group(['prefix' => 'cart'], function () {

    Route::get('/all', 'CartController@all');

    Route::post('/', 'CartController@store');

    Route::get('/{id}', 'CartController@show')->where('id', '[0-9]+');

    Route::post('/{id}', 'CartController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'CartController@destroy')->where('id', '[0-9]+');

});


