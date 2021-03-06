<?php

Route::group(['middleware' => 'auth', 'prefix' => 'inventory', 'namespace' => 'Point\Framework\Http\Controllers\Inventory'], function () {
    Route::get('/report', 'InventoryReportController@index');
    Route::get('/report/detail/{item_id}', 'InventoryReportController@detail');

    Route::get('/value-report', 'InventoryValueReportController@index');
    Route::get('/value-report/detail/{item_id}', 'InventoryValueReportController@detail');
});
