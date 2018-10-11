<?php

Route::group(['prefix' => 'supplier-directory'], function () {

    Route::get('/all', 'SupplierDirectoryController@all');

    Route::post('/', 'SupplierDirectoryController@store');

    Route::post('/{id}', 'SupplierDirectoryController@update')->where('id', '[0-9]+');

    Route::get('/{id}', 'SupplierDirectoryController@show')->where('id', '[0-9]+');

    Route::delete('/{id}', 'SupplierDirectoryController@destroy')->where('id', '[0-9]+');

    Route::post('/directory' , 'SupplierDirectoryController@directory');

    Route::get('/sort/{type}', 'SupplierDirectoryController@SortSupplierDirectories');

});


