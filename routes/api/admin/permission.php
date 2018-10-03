<?php

Route::group(['prefix' => 'permission'] , function ()
{


    Route::post('/assign-permission' , 'PermissionController@AssignPermissionForRole');
    Route::post('/remove-permission' , 'PermissionController@RemovePermissionFromRole');
    Route::get('/all/{permission}' , 'PermissionController@all');


});


