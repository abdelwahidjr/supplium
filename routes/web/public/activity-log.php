<?php

Route::group(['prefix' => 'activity-log'] , function ()
{

    Route::get('/all' , 'ActivityLogController@all');

    Route::get('/show-activity/{id}' , 'ActivityLogController@ShowActivity')->where('id' , '[0-9]+');

    Route::get('/find-user-activity/{id}' , 'ActivityLogController@FindUserActivity')->where('id' , '[0-9]+');


});


