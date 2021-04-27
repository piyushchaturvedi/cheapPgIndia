<?php
use Illuminate\Support\Facades\Route;
// Booking
Route::group(['prefix'=>config('booking.booking_route_prefix')],function(){
    Route::post('/addToCart','BookingController@addToCart');
    Route::post('/doCheckout','BookingController@doCheckout')->name('booking.doCheckout');
    Route::get('/confirm/{gateway}','BookingController@confirmPayment');
    Route::get('/cancel/{gateway}','BookingController@cancelPayment');
    Route::get('/{code}','BookingController@detail');
    Route::get('/{code}/checkout','BookingController@checkout');
    Route::post('/{code}/checkout','BookingController@checkout');

    Route::get('/{code}/check-status','BookingController@checkStatusCheckout');
    Route::get('/payment_success','BookingController@payment_success')->name('payment_success');
    Route::post('/payment_success','BookingController@payment_success')->name('payment_success');
    Route::post('/payment_failure',function(){
        echo 'Your payment is failed please try again';
    })->name('payment_failure');
    //ical
	Route::get('/export-ical/{type}/{id}','BookingController@exportIcal')->name('booking.admin.export-ical');
    //inquiry
    Route::post('/addEnquiry','BookingController@addEnquiry');
    Route::post('/get_coupon_detail','BookingController@get_copupon_detail')->name('booking.coupon');
    Route::get('/email_preview/{id}','BookingController@email_preview');
});
// Route::get('/payment_success','BookingController@payment_success')->name('payment_success');


Route::group(['prefix'=>'gateway'],function(){
    Route::get('/confirm/{gateway}','NormalCheckoutController@confirmPayment')->name('gateway.confirm');
    Route::get('/cancel/{gateway}','NormalCheckoutController@cancelPayment')->name('gateway.cancel');
    Route::get('/info','NormalCheckoutController@showInfo')->name('gateway.info');
});
