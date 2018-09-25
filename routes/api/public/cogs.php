<?php

Route::group(['prefix' => 'cogs'], function () {

    Route::get('/total-orders/{id}', 'CogsController@TotalOrders')
        ->where('id', '[0-9]+');


});
