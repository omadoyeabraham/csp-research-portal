<?php

//Auth::routes();

Route::get('/', 'pagesController@showHomePage');

Route::get('/public', 'pagesController@showHomePage');

Route::get('test-route', 'pagesController@showTestPage');

Route::get('corporate-results', 'pagesController@showCorporateResultsPage');

Route::get('market-summaries', 'pagesController@showMarketSummaryPage');

Route::get('price-lists', 'pagesController@showPriceListPage');

Route::get('/instrument-search/{id}', 'pagesController@showInstrumentSearchPage');

Route::get('/getWebTickers', 'pagesController@getWebTickers');

Route::get('getNseAsiData', 'pagesController@getNseAsiData');

Route::get('/admin_csp_research', 'pagesController@showAdminHomePage');

Route::get('reports', 'pagesController@showReportsPage');

Route::get('login', 'pagesController@showLoginPage');

Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'pagesController@showRegisterPage');

Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('market-data', 'pagesController@showMarketDataPage');

Route::get('api/v1/getStockData/{ticker}', 'instrumentsController@getStockData');

Route::get('updateGoogleNewsFeed', 'pagesController@updateGoogleNewsFeed');

Route::get('nse-asi', 'pagesController@showNseAsiPage');

Route::get('getNseAsiHistoricalData', 'pagesController@getNseAsiHistoricalData');

Route::post('/show-instrument-homepage', 'instrumentsController@showHomePage');

Route::post('reports', 'pagesController@showReportsPage');

Route::post('subscribe', 'pagesController@createNewSubscriber');

Route::post('/bond-page', "pagesController@showBondPage");

Route::resource('corporate-result', 'CorporateResultController');

Route::resource('full-half-year-report', 'FullHalfYearReportController');

Route::resource('african-global-market', 'AfricanGlobalMarketController');

Route::resource('price-list', 'PriceListController');

Route::resource('market-summary', 'MarketSummaryController');

Route::resource('dividend-bonus', 'DividendBonusController');

Route::resource('presentation', 'PresentationController');

Route::resource('company-profile', 'CompanyProfileController');

Route::resource('research-report', 'ResearchReportController');

Route::resource('fixed-income', 'FixedIncomeController');

Route::resource('master-template', 'MasterTemplateController');