<?php

Route::group(['middleware' => 'web', 'prefix' => 'distributor', 'namespace' => 'Modules\Distributor\Http\Controllers'], function()
{
    Route::any('/login','LoginController@index');
    Route::post('/loginCheck','LoginController@check');
    Route::any('/bis','bisController@index');
    Route::any('/info','bisController@info');
    Route::any('/order_list','bisController@order_list');
    Route::any('/extract','bisController@extract');
    Route::any('/my_code','bisController@my_code');
    Route::any('/pay','bisOrderController@pay');
});
