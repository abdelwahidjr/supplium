<?php

Route::group(['prefix' => 'company'] , function ()
{

    Route::get('/all' , 'CompanyController@all');

    Route::post('/' , 'CompanyController@store');

    Route::get('/{id}' , 'CompanyController@show')->where('id' , '[0-9]+');

    Route::post('/{id}' , 'CompanyController@update')->where('id' , '[0-9]+');

    Route::delete('/{id}' , 'CompanyController@destroy')->where('id' , '[0-9]+');
    Route::get('/invoices',   [ 'as' => 'company.invoices', 'uses' => 'CompanyController@web_company_invoices']);


});
