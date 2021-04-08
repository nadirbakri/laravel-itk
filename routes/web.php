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

/* Route Untuk Halaman Reset Password */
Route::get('reset_password', 'ResetPasswordController@pageResetPassword');
Route::get('reset_password/success', 'ResetPasswordController@pageSuccessResetPassword');
Route::get('reset_password/otp', 'ResetPasswordController@pageOTPResetPassword');
Route::get('reset_password/resend', 'ResetPasswordController@pageResendResetPassword');

/* Route Untuk View Home dan Logout dengan Middleware Auth */
Route::get('home', 'HomeController@pageHome')->name('home');
Route::get('logout', 'LoginController@logout')->name('logout');

/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);
