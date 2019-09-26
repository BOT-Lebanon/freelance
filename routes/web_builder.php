<?php

/* custom routes generated by CRUD */
Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

    Route::get('city', ['as'=> 'city.index', 'uses' => 'Admin\CityController@index']);
    Route::post('city', ['as'=> 'city.store', 'uses' => 'Admin\CityController@store']);
    Route::get('city/create', ['as'=> 'city.create', 'uses' => 'Admin\CityController@create']);
    Route::put('city/{regions}', ['as'=> 'city.update', 'uses' => 'Admin\CityController@update']);
    Route::patch('city/{regions}', ['as'=> 'city.update', 'uses' => 'Admin\CityController@update']);
    Route::get('city/{id}/delete', array('as' => 'city.delete', 'uses' => 'Admin\CityController@getDelete'));
    Route::get('city/{id}/confirm-delete', array('as' => 'city.confirm-delete', 'uses' => 'Admin\CityController@getModalDelete'));
    Route::get('city/{regions}', ['as'=> 'city.show', 'uses' => 'Admin\CityController@show']);
    Route::get('city/{regions}/edit', ['as'=> 'city.edit', 'uses' => 'Admin\CityController@edit']);

});

Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('cities', ['as'=> 'cities.index', 'uses' => 'CityController@index']);
Route::post('cities', ['as'=> 'cities.store', 'uses' => 'CityController@store']);
Route::get('cities/create', ['as'=> 'cities.create', 'uses' => 'CityController@create']);
Route::put('cities/{cities}', ['as'=> 'cities.update', 'uses' => 'CityController@update']);
Route::patch('cities/{cities}', ['as'=> 'cities.update', 'uses' => 'CityController@update']);
Route::get('cities/{id}/delete', array('as' => 'cities.delete', 'uses' => 'CityController@getDelete'));
Route::get('cities/{id}/confirm-delete', array('as' => 'cities.confirm-delete', 'uses' => 'CityController@getModalDelete'));
Route::get('cities/{cities}', ['as'=> 'cities.show', 'uses' => 'CityController@show']);
Route::get('cities/{cities}/edit', ['as'=> 'cities.edit', 'uses' => 'CityController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('countries', ['as'=> 'countries.index', 'uses' => 'CountryController@index']);
Route::post('countries', ['as'=> 'countries.store', 'uses' => 'CountryController@store']);
Route::get('countries/create', ['as'=> 'countries.create', 'uses' => 'CountryController@create']);
Route::put('countries/{countries}', ['as'=> 'countries.update', 'uses' => 'CountryController@update']);
Route::patch('countries/{countries}', ['as'=> 'countries.update', 'uses' => 'CountryController@update']);
Route::get('countries/{id}/delete', array('as' => 'countries.delete', 'uses' => 'CountryController@getDelete'));
Route::get('countries/{id}/confirm-delete', array('as' => 'countries.confirm-delete', 'uses' => 'CountryController@getModalDelete'));
Route::get('countries/{countries}', ['as'=> 'countries.show', 'uses' => 'CountryController@show']);
Route::get('countries/{countries}/edit', ['as'=> 'countries.edit', 'uses' => 'CountryController@edit']);

});


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('resources', ['as'=> 'resources.index', 'uses' => 'ResourceController@index']);
Route::post('resources', ['as'=> 'resources.store', 'uses' => 'ResourceController@store']);
Route::get('resources/create', ['as'=> 'resources.create', 'uses' => 'ResourceController@create']);
Route::put('resources/{resources}', ['as'=> 'resources.update', 'uses' => 'ResourceController@update']);
Route::patch('resources/{resources}', ['as'=> 'resources.update', 'uses' => 'ResourceController@update']);
Route::get('resources/{id}/delete', array('as' => 'resources.delete', 'uses' => 'ResourceController@getDelete'));
Route::get('resources/{id}/confirm-delete', array('as' => 'resources.confirm-delete', 'uses' => 'ResourceController@getModalDelete'));
Route::get('resources/{resources}', ['as'=> 'resources.show', 'uses' => 'ResourceController@show']);
Route::get('resources/{resources}/edit', ['as'=> 'resources.edit', 'uses' => 'ResourceController@edit']);

});


/*Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('allowedmodules', ['as'=> 'allowedmodules.index', 'uses' => 'AllowedmodulesController@index']);
Route::post('allowedmodules', ['as'=> 'allowedmodules.store', 'uses' => 'AllowedmodulesController@store']);
Route::get('allowedmodules/create', ['as'=> 'allowedmodules.create', 'uses' => 'AllowedmodulesController@create']);
Route::put('allowedmodules/{allowedmodules}', ['as'=> 'allowedmodules.update', 'uses' => 'AllowedmodulesController@update']);
Route::patch('allowedmodules/{allowedmodules}', ['as'=> 'allowedmodules.update', 'uses' => 'AllowedmodulesController@update']);
Route::get('allowedmodules/{id}/delete', array('as' => 'allowedmodules.delete', 'uses' => 'AllowedmodulesController@getDelete'));
Route::get('allowedmodules/{id}/confirm-delete', array('as' => 'allowedmodules.confirm-delete', 'uses' => 'AllowedmodulesController@getModalDelete'));
Route::get('allowedmodules/{allowedmodules}', ['as'=> 'allowedmodules.show', 'uses' => 'AllowedmodulesController@show']);
Route::get('allowedmodules/{allowedmodules}/edit', ['as'=> 'allowedmodules.edit', 'uses' => 'AllowedmodulesController@edit']);

});*/


Route::group(array('prefix' => 'admin/', 'middleware' => 'admin','as'=>'admin.'), function () {

Route::get('allowedusers', ['as'=> 'allowedusers.index', 'uses' => 'AlloweduserController@index']);
Route::post('allowedusers', ['as'=> 'allowedusers.store', 'uses' => 'AlloweduserController@store']);
Route::get('allowedusers/create', ['as'=> 'allowedusers.create', 'uses' => 'AlloweduserController@create']);
Route::put('allowedusers/{allowedusers}', ['as'=> 'allowedusers.update', 'uses' => 'AlloweduserController@update']);
Route::patch('allowedusers/{allowedusers}', ['as'=> 'allowedusers.update', 'uses' => 'AlloweduserController@update']);
Route::get('allowedusers/{id}/delete', array('as' => 'allowedusers.delete', 'uses' => 'AlloweduserController@getDelete'));
Route::get('allowedusers/{id}/confirm-delete', array('as' => 'allowedusers.confirm-delete', 'uses' => 'AlloweduserController@getModalDelete'));
Route::get('allowedusers/{allowedusers}', ['as'=> 'allowedusers.show', 'uses' => 'AlloweduserController@show']);
Route::get('allowedusers/{allowedusers}/edit', ['as'=> 'allowedusers.edit', 'uses' => 'AlloweduserController@edit']);

});
