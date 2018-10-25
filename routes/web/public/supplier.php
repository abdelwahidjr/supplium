<?php

Route::group(['prefix' => 'supplier'] , function ()
{

    Route::get('/all' , 'SupplierController@web_all');

    Route::get('/add' , 'SupplierController@web_create');

    Route::post('/' , 'SupplierController@web_store');
    
    Route::get('/edit_info/{id}' , 'SupplierController@web_edit_info')->where('id' , '[0-9]+');
    
    Route::get('/edit_payment/{id}' , 'SupplierController@web_edit_payment')->where('id' , '[0-9]+');
    
    Route::get('/edit_products/{id}' , 'SupplierController@web_edit_products')->where('id' , '[0-9]+');
    
    Route::post('/get_products/{id}' , 'SupplierController@web_get_products')->where('id' , '[0-9]+');
    
    Route::patch('/web_update_info/{id}' , 'SupplierController@web_update_info')->where('id' , '[0-9]+');
    
    Route::patch('/web_update_payment/{id}' , 'SupplierController@web_update_payment')->where('id' , '[0-9]+');
    
    Route::patch('/web_update_products/{id}' , 'SupplierController@web_update_products')->where('id' , '[0-9]+');

    Route::get('/{id}' , 'SupplierController@web_show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'SupplierController@web_update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'SupplierController@web_destroy')->where('id' , '[0-9]+');

    // Route::post('/directory' , 'SupplierController@wdirectory');

    // Route::get('/sort-suppliers/{type}' , 'SupplierController@SortSuppliersByName');

});


