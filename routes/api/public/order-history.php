<?php

Route::group(['prefix' => 'order-history'], function () {



    Route::get('/total-orders/{id}', 'OrderHistoryController@TotalOrders')
        ->where('id', '[0-9]+');

    Route::get('/total-purchases/{id}', 'OrderHistoryController@TotalPurchases')
        ->where('id', '[0-9]+');


    Route::get('/total-suppliers/{id}', 'OrderHistoryController@TotalSupliers')
        ->where('id', '[0-9]+');

    Route::get('/total-items/{id}', 'OrderHistoryController@TotalItems')
        ->where('id', '[0-9]+');



});
