<?php

Route::group(['prefix' => 'product'] , function ()
{


    Route::post('/directory' , 'ProductController@directory');

});


