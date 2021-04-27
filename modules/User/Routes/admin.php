<?php
use \Illuminate\Support\Facades\Route;

Route::get('/getForSelect2', 'UserController@getForSelect2')->name('user.admin.getForSelect2');
Route::get('/', 'UserController@index')->name('user.admin.index');
Route::get('/create', 'UserController@create')->name('user.admin.create');
Route::get('/edit/{id}', 'UserController@edit')->name('user.admin.detail');
Route::post('/store/{id}', 'UserController@store')->name('user.admin.store');
Route::post('/bulkEdit', 'UserController@bulkEdit')->name('user.admin.bulkEdit');
Route::get('/password/{id}','UserController@password')->name('user.admin.password');
Route::post('/changepass/{id}','UserController@changepass')->name('user.admin.changepass');
Route::get('/testMail', 'UserController@testMail');
Route::get('/userUpgradeRequest', 'UserController@userUpgradeRequest')->name('user.admin.upgrade');
Route::get('/upgrade/{id}','UserController@userUpgradeRequestApprovedId')->name('user.admin.upgradeId');
Route::post('/userUpgradeRequestApproved', 'UserController@userUpgradeRequestApproved')->name('user.admin.userUpgradeRequestApproved');


Route::group(['prefix' => 'role'], function () {
    Route::get('/', 'RoleController@index')->name('user.admin.role.index');
    Route::get('/verifyFields', 'RoleController@verifyFields')->name('user.admin.role.verifyFields');
    Route::get('/permission_matrix', 'RoleController@permission_matrix')->name('user.admin.role.permission_matrix');
    Route::get('/create', 'RoleController@create')->name('user.admin.role.create');
    Route::get('/edit/{id}', 'RoleController@edit')->name('user.admin.role.detail');
    Route::post('/store/{id}', 'RoleController@store')->name('user.admin.role.store');
    Route::post('/verifyFieldsStore', 'RoleController@verifyFieldsStore')->name('user.admin.role.verifyFieldsStore');
    Route::get('/verifyFieldsEdit/{id}', 'RoleController@verifyFieldsEdit')->name('user.admin.role.verifyFieldsEdit');
    Route::post('/bulkEdit', 'RoleController@bulkEdit')->name('user.admin.role.bulkEdit');
    Route::post('/save_permissions', 'RoleController@save_permissions')->name('user.admin.role.save_permissions');
});

Route::group(['prefix' => 'verification'], function () {
    Route::get('/', 'VerificationController@index')->name('user.admin.verification.index');
    Route::get('detail/{id}', 'VerificationController@detail')->name('user.admin.verification.detail');
    Route::post('store/{id}', 'VerificationController@store')->name('user.admin.verification.store');
});


Route::group(['prefix'=>'wallet'],function (){
    Route::get('/add-credit/{id}','WalletController@addCredit')->name('user.admin.wallet.addCredit');
    Route::post('/add-credit/{id}','WalletController@store')->name('user.admin.wallet.store');
    Route::get('/report','WalletController@report')->name('user.admin.wallet.report');
    Route::post('/reportBulkEdit','WalletController@reportBulkEdit')->name('user.admin.wallet.reportBulkEdit');

});