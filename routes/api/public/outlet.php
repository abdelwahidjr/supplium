<?php

Route::group(['prefix' => 'outlet'], function () {

    Route::get('/all', 'OutletController@all');

    Route::post('/', 'OutletController@store');

    Route::get('/{id}', 'OutletController@show')->where('id', '[0-9]+');

    Route::post('/{id}', 'OutletController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'OutletController@destroy')->where('id', '[0-9]+');


});
