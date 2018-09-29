<?php

Route::group(['prefix' => 'plan'] , function ()
{

    Route::get('/all' , 'PlanController@all');

    Route::post('/' , 'PlanController@store');

    Route::get('/{id}' , 'PlanController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'PlanController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'PlanController@destroy')->where('id' , '[0-9]+');

});


