<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


/* Route Untuk Halaman Login */
Route::get('login', 'LoginController@pageLogin');
Route::post('login/proses', 'LoginController@prosesLogin');
Route::get('logout', 'LoginController@prosesLogout');

/* Route Untuk Halaman Reset Password */
Route::get('reset_password', 'ResetPasswordController@pageResetPassword');
Route::get('reset_password/success', 'ResetPasswordController@pageSuccessResetPassword');
Route::get('reset_password/send_otp', 'ResetPasswordController@pageSendOTPResetPassword');
Route::get('reset_password/resend', 'ResetPasswordController@pageResendResetPassword');
Route::post('reset_password/proses', 'ResetPasswordController@prosesResetPassword');
Route::post('reset_password/send_otp/proses', 'ResetPasswordController@prosesSendOTPResetPassword');

/* Route Untuk View Home */
Route::get('main', 'HomeController@pageMain')->name('main');
Route::get('home', 'DashboardController@pageHomeDashboard');
Route::get('home/breadcrumbs', 'HomeController@getURLBreadcrumbs');

/* Route Untuk Menu Personel */
Route::get('personel', 'PersonelController@pagePersonel');

/* Route Untuk Menu Time Management */
Route::get('time_management', 'TimeManagementController@pageTimeManagement');

/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);
