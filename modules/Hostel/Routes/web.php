<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('hostel.hostel_route_prefix')],function(){
    Route::get('/','HostelController@index')->name('hostel.search'); // Search
    Route::get('/{slug}','HostelController@detail')->name('hostel.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('hostel.hotel_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorController@index')->name('hostel.vendor.index');
    Route::get('/create','VendorController@create')->name('hostel.vendor.create');
    Route::get('/recovery','VendorController@recovery')->name('hostel.vendor.recovery');
    Route::get('/restore/{id}','VendorController@restore')->name('hostel.vendor.restore');
    Route::get('/edit/{id}','VendorController@edit')->name('hostel.vendor.edit');
    Route::get('/del/{id}','VendorController@delete')->name('hostel.vendor.delete');
    Route::post('/store/{id}','VendorController@store')->name('hostel.vendor.store');
    Route::get('bulkEdit/{id}','VendorController@bulkEdithotel')->name("hostel.vendor.bulk_edit");
    Route::get('/booking-report','VendorController@bookingReport')->name("hostel.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','VendorController@bookingReportBulkEdit')->name("hostel.vendor.booking_report.bulk_edit");
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('hostel.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('hostel.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('hostel.vendor.availability.store');
    });
    Route::group(['prefix'=>'room'],function (){
        Route::get('{hotel_id}/index','VendorRoomController@index')->name('hostel.vendor.room.index');
        Route::get('{hotel_id}/create','VendorRoomController@create')->name('hostel.vendor.room.create');
        Route::get('{hotel_id}/edit/{id}','VendorRoomController@edit')->name('hostel.vendor.room.edit');
        Route::post('{hotel_id}/store/{id}','VendorRoomController@store')->name('hostel.vendor.room.store');
        Route::get('{hotel_id}/del/{id}','VendorRoomController@delete')->name('hostel.vendor.room.delete');
        Route::get('{hotel_id}/bulkEdit/{id}','VendorRoomController@bulkEdit')->name('hostel.vendor.room.bulk_edit');
    });
});

Route::group(['prefix'=>'user/'.config('hostel.hotel_route_prefix')],function(){
    Route::group(['prefix'=>'{hotel_id}/availability'],function(){
        Route::get('/','AvailabilityController@index')->name('hostel.vendor.room.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('hostel.vendor.room.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('hostel.vendor.room.availability.store');
    });
});

Route::post(config('hostel.hostel_route_prefix').'/checkAvailability','HostelController@checkAvailability')->name('hostel.checkAvailability');
