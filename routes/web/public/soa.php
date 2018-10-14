<?php

Route::group(['prefix' => 'soa'] , function ()
{

    Route::get('/all' , 'SOAController@all');

    Route::get('/brand' , 'SOAController@brand');

    Route::get('/supplier' , 'SOAController@supplier');

    Route::get('/date' , 'SOAController@date');

    Route::get('/outlet' , 'SOAController@outlet');

});


