<?php

Route::group(['prefix' => 'standing-orders'] , function ()
{

    Route::get('/all' , 'StandingOrderController@all');

    Route::post('/' , 'StandingOrderController@store');

    Route::get('/{id}' , 'StandingOrderController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'StandingOrderController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'StandingOrderController@destroy')->where('id' , '[0-9]+');

});


