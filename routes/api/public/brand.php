<?php

Route::group(['prefix' => 'brand'], function () {

    Route::get('/all', 'BrandController@all');

    Route::post('/', 'BrandController@store');

    Route::get('/{id}', 'BrandController@show')->where('id', '[0-9]+');

    Route::post('/{id}', 'BrandController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'BrandController@destroy')->where('id', '[0-9]+');


});
