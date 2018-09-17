<?php

Route::group(['prefix' => 'product'], function () {

    Route::get('/all', 'ProductController@all');

    Route::post('/', 'ProductController@store');

    Route::get('/{id}', 'ProductController@show')->where('id', '[0-9]+');

    Route::post('/{id}', 'ProductController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'ProductController@destroy')->where('id', '[0-9]+');

});


