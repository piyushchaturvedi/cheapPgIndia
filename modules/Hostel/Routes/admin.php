<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','HotelController@index')->name('hostel.admin.index');
Route::get('/create','HotelController@create')->name('hostel.admin.create');
Route::get('/edit/{id}','HotelController@edit')->name('hostel.admin.edit');
Route::post('/store/{id}','HotelController@store')->name('hostel.admin.store');
Route::post('/bulkEdit','HotelController@bulkEdit')->name('hostel.admin.bulkEdit');
Route::get('/recovery','HotelController@recovery')->name('hostel.admin.recovery');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('hostel.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('hostel.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('hostel.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('hostel.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('hostel.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('hostel.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('hostel.admin.attribute.term.getForSelect2');
    Route::get('getAttributeForSelect2','AttributeController@getAttributeForSelect2')->name('hostel.admin.attribute.getForSelect2');
});
Route::group(['prefix'=>'room'],function (){

    Route::group(['prefix'=>'attribute'],function (){
        Route::get('/','RoomAttributeController@index')->name('hostel.admin.room.attribute.index');
        Route::get('edit/{id}','RoomAttributeController@edit')->name('hostel.admin.room.attribute.edit');
        Route::post('store/{id}','RoomAttributeController@store')->name('hostel.admin.room.attribute.store');
        Route::post('editAttrBulk','RoomAttributeController@editAttrBulk')->name('hostel.admin.room.attribute.editAttrBulk');

        Route::get('terms/{id}','RoomAttributeController@terms')->name('hostel.admin.room.attribute.term.index');
        Route::get('term_edit/{id}','RoomAttributeController@term_edit')->name('hostel.admin.room.attribute.term.edit');
        Route::get('term_store','RoomAttributeController@term_store')->name('hostel.admin.room.attribute.term.store');

        Route::get('getForSelect2','RoomAttributeController@getForSelect2')->name('hostel.admin.room.attribute.term.getForSelect2');
    });

    Route::get('{hotel_id}/index','RoomController@index')->name('hostel.admin.room.index');
    Route::get('{hotel_id}/create','RoomController@create')->name('hostel.admin.room.create');
    Route::get('{hotel_id}/edit/{id}','RoomController@edit')->name('hostel.admin.room.edit');
    Route::post('{hotel_id}/store/{id}','RoomController@store')->name('hostel.admin.room.store');


    Route::post('/bulkEdit','RoomController@bulkEdit')->name('hostel.admin.room.bulkEdit');

});

Route::group(['prefix'=>'{hotel_id}/availability'],function(){
    Route::get('/','AvailabilityController@index')->name('hostel.admin.room.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('hostel.admin.room.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('hostel.admin.room.availability.store');
});

