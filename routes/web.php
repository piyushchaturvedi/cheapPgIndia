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
Route::get('/intro','LandingpageController@index');
Route::get('/', 'HomeController@index')->name('index.home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/install/check-db', 'HomeController@checkConnectDatabase');

Route::get('/update', function (){
    return redirect('/');
});

//Cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cleared!";
});

//Login
Auth::routes();
//Custom User Login and Register
Route::post('register','\Modules\User\Controllers\UserController@userRegister')->name('auth.register');
Route::post('login','\Modules\User\Controllers\UserController@userLogin')->name('auth.login');
Route::get('loginWithOTP',function(){
    return view('User::frontend.login-with-otp');
})->name('auth.loginWithOTP');
Route::post('loginWithOTP','\Modules\User\Controllers\UserController@loginWithOTP')->name('auth.loginWithOTP');
Route::post('send_otp','\Modules\User\Controllers\UserController@send_otp')->name('auth.send_otp');
Route::post('logout','\Modules\User\Controllers\UserController@logout')->name('auth.logout');
Route::get('admin/agreement','\Modules\Dashboard\Controllers\DashboardController@agreement');
Route::get('admin/pg_agreement','\Modules\Dashboard\Controllers\DashboardController@pg_agreement');
// Social Login
Route::get('social-login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('social-callback/{provider}', 'Auth\LoginController@socialCallBack');

// Logs
Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard','system_log_view']);
