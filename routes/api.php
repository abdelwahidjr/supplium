<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function ()
{
    Route::post('/login' , 'UserAuthController@login');
    Route::post('/change-password' , 'UserAuthController@changePassword');
    Route::post('/password/email' , 'Auth\ForgotPasswordController@getResetToken');;
    Route::post('/password/reset' , 'Auth\ResetPasswordController@reset');
});

Route::prefix('admin')->middleware(['auth:api' , 'role:admin'])->group(function ()
{
    foreach (File::allFiles(base_path('routes/api/admin')) as $file)
    {
        require($file->getPathname());
    }
});

Route::prefix('public')->middleware(['auth:api'])->group(function ()
{
    foreach (File::allFiles(base_path('routes/api/public')) as $file)
    {
        require($file->getPathname());
    }
});
/*
Route::get('/test-response' , function ()
{
    return response()->json([
        'user' => [
            'fisrt_name' => 'mohamed' ,
            'last_name'  => 'abdelwahid' ,
        ] ,
    ]);
});*/

Route::post('/test-response' , function (Request $request)
{

    return response()->json([
        'user' => [
            'fisrt_name' => 'mohamed' ,
            'last_name'  => 'abdelwahid' ,
        ] ,
    ]);

});
