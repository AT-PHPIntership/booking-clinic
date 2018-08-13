<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'API\User'], function() {
    Route::apiResource('clinic-types', 'ClinicTypeController')->only(['index', 'show']);
    Route::apiResource('clinics', 'ClinicController')->only(['index', 'show']);
});
Route::group(['namespace'=>'API\User'], function () {
    Route::apiResource('clinics', 'ClinicTypeController');
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');
        Route::group(['middleware' => 'auth:api'], function() {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
          });
    });
});
