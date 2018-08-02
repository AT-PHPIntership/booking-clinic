<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function() {

    Route::group(['middleware' => ['auth:web-admin', 'admin']], function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('clinic-types', 'ClinicTypeController', ['parameters' => [
            'clinic-types' => 'clinicType']
        ]);
        Route::resource('users', 'UserController')->only([
            'index', 'show'
        ]);
        Route::resource('clinics', 'ClinicController');
    });

    Auth::routes();

});
Route::view('test', 'admin_clinic.dashboard');
Route::group(['prefix' => 'test', 'namespace' => 'AdminClinic'], function () {
    Route::resource('appointments', 'AppointmentController')
    ->only(['index', 'show', 'edit']);
});


Route::get('/home', 'HomeController@index')->name('home');
