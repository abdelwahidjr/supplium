<?php

Route::group(['prefix' => 'search'], function () {


    Route::get('/search-orders-by-company/{id}', 'SearchController@SearchOrdersByCompany')
        ->where('id', '[0-9]+');


    Route::get('/search-suppliers-by-company/{id}', 'SearchController@SearchSuppliersByCompany')
        ->where('id', '[0-9]+');


    Route::get('/search-orders-by-brand/{id}', 'SearchController@SearchOrdersByBrand')
        ->where('id', '[0-9]+');


    Route::get('/search-suppliers-by-brand/{id}', 'SearchController@SearchSuppliersByBrand')
        ->where('id', '[0-9]+');


    Route::get('/search-orders-by-outlet/{id}', 'SearchController@SearchOrdersByOutlet')
        ->where('id', '[0-9]+');


    Route::get('/search-suppliers-by-outlet/{id}', 'SearchController@SearchSuppliersByOutlet')
        ->where('id', '[0-9]+');


    Route::get('/search-user-by-email', 'SearchController@SearchUsersByEmail')
        ->where('id', '[0-9]+');


    Route::get('/search-invoices-by-company-and-date', 'SearchController@SearchInvoicesByCompanyAndDate')
        ->where('id', '[0-9]+');


    Route::get('/search-invoices-by-date', 'SearchController@SearchInvoicesByDate')
        ->where('id', '[0-9]+');


    Route::get('/search-orders-by-company-and-date', 'SearchController@SearchOrdersByCompanyAndDate')
        ->where('id', '[0-9]+');


    Route::get('/search-orders-by-date', 'SearchController@SearchOrdersByDate')
        ->where('id', '[0-9]+');


});
