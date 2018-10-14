<?php

Route::group(['prefix' => 'supplier'] , function ()
{

    Route::get('/all' , 'SupplierController@web_all');

    Route::post('/' , 'SupplierController@web_store');

    Route::get('/{id}' , 'SupplierController@web_show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'SupplierController@web_update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'SupplierController@web_destroy')->where('id' , '[0-9]+');

    // Route::post('/directory' , 'SupplierController@wdirectory');

    // Route::get('/sort-suppliers/{type}' , 'SupplierController@SortSuppliersByName');

});


