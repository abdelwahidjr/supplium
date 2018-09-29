<?php

Route::group(['prefix' => 'order'] , function ()
{

    Route::get('/all' , 'OrderController@all');

    Route::post('/' , 'OrderController@store');

    Route::get('/{id}' , 'OrderController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'OrderController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'OrderController@destroy')->where('id' , '[0-9]+');

});


