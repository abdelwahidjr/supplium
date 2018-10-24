<?php

Route::group(['prefix' => 'order'], function () {


    Route::get('/standing',   [ 'as' => 'order.standing', 'uses' => 'OrderController@company_standing_orders_web']);
    Route::get('/history',   [ 'as' => 'order.history', 'uses' => 'OrderController@web_all']);
    Route::get('/new',   [ 'as' => 'order.new', 'uses' => 'OrderController@web_create']);
    Route::get('/place',   [ 'as' => 'order.place', 'uses' => 'OrderController@web_place']);
    Route::get('/test',   [ 'as' => 'order.test', 'uses' => 'OrderController@web_test']);
    Route::get('/get-all-products/{supplier_id}',   [ 'as' => 'order.products', 'uses' => 'OrderController@web_get_all_products']);
    Route::post('/store-order',   [ 'as' => 'order.store', 'uses' => 'OrderController@web_store']);
    //Route::get('/get-all-products' , 'OrderController@web_get_all_products');



});


