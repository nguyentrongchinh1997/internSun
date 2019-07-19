<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('login', function(){
// 	return view("client.pages.login");
// });
Route::get("login", "UserController@getLogin");
Route::post("login", "UserController@postLogin");
Route::get("signup", "UserController@getSignup");
Route::post("signup", "UserController@postSignup");


Route::group(["prefix"=>"admin"], function(){
	Route::group(["prefix"=>"category"], function(){
		Route::get("add", "CategoryController@getAddCategoryForm");
		Route::post("add", "CategoryController@postAddCategory");
		Route::get("list", "CategoryController@getListCategoryForm");
		Route::get("delete/{id}", "CategoryController@deleteCategory");
		Route::get("edit/{id}", "CategoryController@getEditCategory");
		Route::post("edit/{id}", "CategoryController@postEditCategory");
	});


	Route::group(["prefix"=>"post"], function(){
		Route::get("edit/{id}", "PostController@getEditPost");
		Route::post("edit/{id}", "PostController@postEditPost");
		Route::get("delete/{id}", "PostController@deletePost");
		Route::get("list", "PostController@getListPost");
		Route::get("add", "PostController@getAddPost");
		Route::post("add", "PostController@postAddPost");
	});

	Route::group(["prefix"=>"document"], function(){
		Route::get("add", "DocumentController@getAddDocument");
		Route::post("add", "DocumentController@postAddDocument");
		Route::get("list", "DocumentController@getListDocument");
		
	});
});