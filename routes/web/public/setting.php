<?php

Route::group(['prefix' => 'setting'] , function ()
{

    Route::get('/all' , 'SettingController@all');

    Route::post('/' , 'SettingController@store');

    Route::get('/{id}' , 'SettingController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'SettingController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'SettingController@destroy')->where('id' , '[0-9]+');


});
