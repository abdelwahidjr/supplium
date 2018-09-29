<?php

Route::group(['prefix' => 'invoice'] , function ()
{

    Route::get('/all' , 'InvoiceController@all');

    Route::post('/' , 'InvoiceController@store');

    Route::get('/{id}' , 'InvoiceController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'InvoiceController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'InvoiceController@destroy')->where('id' , '[0-9]+');

});


