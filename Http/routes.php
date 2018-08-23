<?php

Route::group(['middleware' => 'web', 'prefix' => 'distributor', 'namespace' => 'Modules\Distributor\Http\Controllers'], function()
{
    Route::get('/login','LoginController@index');
    Route::get('/loginCheck','LoginController@check');
    Route::get('/bis','bisController@index');
    Route::get('/info','bisController@info');
    Route::get('/order_list','bisController@order_list');
    Route::get('/extract','bisController@extract');
    Route::get('/my_code','bisController@my_code');
});
