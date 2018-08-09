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
Route::group(['prefix' => 'admin/{slug}', 'as' => 'admin_clinic.', 'namespace' => 'AdminClinic'], function() {
    Route::group(['middleware' => ['auth:web-admin', 'clinic.admin']], function() {
        Route::resource('dashboard', 'DashboardController')
            ->only(['index', 'update']);
        Route::resource('appointments', 'AppointmentController')
            ->only(['index', 'show', 'edit', 'update']);
        Route::get('calendar', 'CalendarController@index')->name('calendar');
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function() {
            Route::get('/', 'ProfileController@show')->name('show');
            Route::get('edit', 'ProfileController@edit')->name('edit');
            Route::put('/', 'ProfileController@update')->name('update');
            Route::get('account/edit', 'ProfileController@editAccount')->name('account.edit');
            Route::put('account', 'ProfileController@updateAccountPassword')->name('account.update');
            Route::patch('account', 'ProfileController@updateAccountName')->name('account.update');
        });    
    });
});

Route::get('/home', 'HomeController@index')->name('home');
