<?php

Route::group(['middleware' => 'web', 'prefix' => 'distributor', 'namespace' => 'Modules\Distributor\Http\Controllers'], function()
{
    Route::get('/', 'DistributorController@index');
});
