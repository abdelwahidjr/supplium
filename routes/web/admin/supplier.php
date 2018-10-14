<?php

Route::group(['prefix' => 'supplier'] , function ()
{


    Route::post('/directory' , 'SupplierController@directory');

});


