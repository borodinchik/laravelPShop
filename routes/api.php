<?php

Route::group(['prefix' => 'category'], function ()
{
    Route::post('add_new','API\CategoryController@addCategory');
    Route::get('tree_show', 'API\CategoryController@showChildAndParentsCategoriesTree');
    Route::get('show_list', 'API\CategoryController@showCategoriesList');
    Route::get('show_category_and_its_products', 'API\CategoryController@getCategoryAndItsProducts');

});

Route::resource('product', 'API\ProductController')->except('create', 'update', 'edit');
Route::post('product/{id}', 'API\ProductController@update');

Route::post('login', 'API\UserController@login');
//Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function()
{
    Route::post('details', 'API\UserController@details');
});