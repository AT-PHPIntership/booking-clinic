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

Route::group(['prefix' => 'admin/{slug}', 'as' => 'admin.', 'namespace' => 'AdminClinic'], function() {
    Route::view('dashboard', 'admin_clinic.dashboard')->name('admin_clinic.dashboard');
    Route::resource('appointments', 'AppointmentController')
    ->only(['index', 'show', 'edit', 'update']);
    Route::patch('appointments', 'AppointmentController@updateListAppointments')->name('appointments.update_list_appointments');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin', 'AdminClinic\AppointmentController@aa');
