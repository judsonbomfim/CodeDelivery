<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function() {

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
        Route::get('/',['as'=>'index', 'uses'=> 'CategoriesController@index']);
        Route::get('create',['as'=>'create', 'uses'=> 'CategoriesController@create']);
        Route::get('edit/{id}',['as'=>'edit', 'uses'=> 'CategoriesController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=> 'CategoriesController@update']);
        Route::post('store',['as'=>'store', 'uses'=> 'CategoriesController@store']);
    });
    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function() {
        Route::get('/',['as'=>'index', 'uses'=> 'ClientsController@index']);
        Route::get('create',['as'=>'create', 'uses'=> 'ClientsController@create']);
        Route::get('edit/{id}',['as'=>'edit', 'uses'=> 'ClientsController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=> 'ClientsController@update']);
        Route::post('store',['as'=>'store', 'uses'=> 'ClientsController@store']);
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
        Route::get('/',['as'=>'index', 'uses'=> 'ProductsController@index']);
        Route::get('create',['as'=>'create', 'uses'=> 'ProductsController@create']);
        Route::get('edit/{id}',['as'=>'edit', 'uses'=> 'ProductsController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=> 'ProductsController@update']);
        Route::post('store',['as'=>'store', 'uses'=> 'ProductsController@store']);
        Route::post('destroy',['as'=>'destroy', 'uses'=> 'ProductsController@destroy']);
    });
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function() {
        Route::get('/',['as'=>'index', 'uses'=> 'OrdersController@index']);
        Route::get('edit/{id}',['as'=>'edit', 'uses'=> 'OrdersController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=> 'OrdersController@update']);
    });
    Route::group(['prefix' => 'cupoms', 'as' => 'cupoms.'], function() {
        Route::get('/',['as'=>'index', 'uses'=> 'CupomsController@index']);
        Route::get('create',['as'=>'create', 'uses'=> 'CupomsController@create']);
        Route::get('edit/{id}',['as'=>'edit', 'uses'=> 'CupomsController@edit']);
        Route::post('store',['as'=>'store', 'uses'=> 'CupomsController@store']);
    });

});

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function() {
    Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
        Route::get('',['as'=>'index','uses'=>'CheckoutController@index']);
        Route::get('create',['as'=>'create','uses'=>'CheckoutController@create']);
        Route::post('store',['as'=>'store','uses'=>'CheckoutController@store']);
    });
});