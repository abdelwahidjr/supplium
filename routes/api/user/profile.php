<?php

Route::group(['prefix' => 'user'], function () {

    Route::get('/{id}', 'UserController@show')->where('id', '[0-9]+');

});


