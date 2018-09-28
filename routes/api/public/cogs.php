<?php

Route::group(['prefix' => 'cogs'] , function ()
{
    Route::get('/total-orders/{id}' , 'CogsController@TotalOrders')
        ->where('id' , '[0-9]+');

    Route::get('/total-purchases/{id}' , 'CogsController@TotalPurchases')
        ->where('id' , '[0-9]+');

    Route::get('/total-suppliers/{id}' , 'CogsController@TotalSupliers')
        ->where('id' , '[0-9]+');

    Route::get('/total-items/{id}' , 'CogsController@TotalItems')
        ->where('id' , '[0-9]+');

    Route::get('/top-supplier-purchases/{id}' , 'CogsController@TopSuplierPurchases')
        ->where('id' , '[0-9]+');

    Route::get('/purchases-over-time/{id}' , 'CogsController@PurchasesOverTime')
        ->where('id' , '[0-9]+');

    Route::get('/purchases-by-supplier/{id}' , 'CogsController@PurchasesBySupplier')
        ->where('id' , '[0-9]+');

    Route::get('/top-product-purchases/{id}' , 'CogsController@TopProductPurchases')
        ->where('id' , '[0-9]+');

});
