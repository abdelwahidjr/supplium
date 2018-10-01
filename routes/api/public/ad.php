<?php

Route::group(['prefix' => 'ad'] , function ()
{
    Route::get('/all' , 'AdController@index');
    Route::post('/' , 'AdController@store');
    Route::get('/{id}' , 'AdController@show')->where('id' , '[0-9]+');
    Route::post('/{id}' , 'AdController@update')->where('id' , '[0-9]+');
    Route::delete('/{id}' , 'AdController@destroy')->where('id' , '[0-9]+');

});


