<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/1/2019
 * Time: 10:02 AM
 */
use Illuminate\Support\Facades\Route;

Route::get('/','CouponController@index')->name('coupon.admin.index');

Route::match(['get'],'/create','CouponController@create')->name('coupon.admin.create');
Route::match(['get'],'/edit/{id}','CouponController@edit')->name('coupon.admin.edit');

Route::post('/store/{id}','CouponController@store')->name('coupon.admin.store');

Route::get('/getForSelect2','CouponController@getForSelect2')->name('coupon.admin.getForSelect2');
Route::post('/bulkEdit','CouponController@bulkEdit')->name('coupon.admin.bulkEdit');
