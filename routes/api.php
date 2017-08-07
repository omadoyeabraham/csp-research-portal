<?php

use Illuminate\Http\Request;

/**
 * These routes are called by various API calls from within the application.
 * The choice to migrate to mainly API calls is to allow for automatic refresh of most of the data on the portal
 */
Route::group(['prefix' => '/v1', 'middleware' =>['cors'] ], function() {
    
    Route::post("register-api-user", 'ApiController@register');

    Route::post("login-api-user", 'ApiController@login');

    Route::get("corporate-results",'ApiController@getAllCorporateResults');

    Route::get("stock-gainers-losers",'ApiController@getStockGainersLosers');

    Route::get("web-tickers", "ApiController@getWebTickers");

    Route::get('store-new-nse-asi-data', "ApiController@storeNewNseAsiData");

    Route::get('get-nse-asi-five-days-data', "ApiController@getNseAsiFiveDaysData");
    
    Route::get('market-data', "ApiController@getMarketData");
    
    
});


Route::group(['middleware' => ['api.jwt-auth', 'cors'] ], function(){
});