<?php

Route::group(['prefix' => 'company'], function () {

    Route::get('/all', 'CompanyController@all');

    Route::get('/{id}', 'CompanyController@show')->where('id', '[0-9]+');

});


