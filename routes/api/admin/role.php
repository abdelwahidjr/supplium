<?php

Route::group(['prefix' => 'role'] , function ()
{


    Route::post('/assign-role' , 'RoleController@AssignRoleForUser');
    Route::post('/remove-role' , 'RoleController@RemoveRoles');
    Route::get('/all/{role}' , 'RoleController@all');


});


