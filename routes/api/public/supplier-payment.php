<?php

Route::group(['prefix' => 'supplier_payment'] , function ()
{

    Route::get('/all' , 'SupplierPaymentController@all');

    Route::post('/' , 'SupplierPaymentController@store');

    Route::get('/{id}' , 'SupplierPaymentController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'SupplierPaymentController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'SupplierPaymentController@destroy')->where('id' , '[0-9]+');

    Route::post('/switch-restriction' , 'SupplierPaymentController@SwitchRestriction');

});


