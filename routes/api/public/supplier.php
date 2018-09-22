<?php

Route::group(['prefix' => 'supplier'], function () {

    Route::get('/all', 'SupplierController@all');

    Route::post('/', 'SupplierController@store');

    Route::get('/{id}', 'SupplierController@show')->where('id', '[0-9]+');

    Route::post('/{id}', 'SupplierController@update')->where('id', '[0-9]+');

    Route::delete('/{id}', 'SupplierController@destroy')->where('id', '[0-9]+');

    Route::post('/directory', 'SupplierController@directory');

});


