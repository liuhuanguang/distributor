<?php

Route::group(['middleware' => 'web', 'prefix' => 'distributor', 'namespace' => 'Modules\Distributor\Http\Controllers'], function()
{
    Route::any('/login','LoginController@index');
    Route::any('/loginCheck','LoginController@check');
    Route::any('/bis','bisController@index');
    Route::any('/info','bisController@info');
    Route::any('/order_list','bisController@order_list');
    Route::any('/extract','bisController@extract');
    Route::any('/my_code','bisController@my_code');
    Route::any('/pay','bisOrderController@pay')->name('pay');
    Route::any('/create_order','bisOrderController@create_order');
    Route::any('/fanxian','bisExtractController@index');
    Route::middleware('wechat.oauth:snsapi_base')->group(function () {
        Route::get('/logins', 'SelfAuthController@autoLogin')->name('logins');
        Route::get('/registers', 'SelfAuthController@autoRegister')->name('registers');
    });
});
