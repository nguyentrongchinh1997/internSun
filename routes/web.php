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

Route::get("login", "client\UserController@getLogin");
Route::post("login", "client\UserController@postLogin");
Route::get("signup", "client\UserController@getSignup");
Route::post("signup", "client\UserController@postSignup");

Route::get("home", "client\IndexController@getIndexPage");
Route::get("document/{tenKhongDau}/{id}.html", "client\DetailDocumentController@detailDocument");

Route::group(["prefix" => "admin", "middleware" => "AdminArea"], function(){
	Route::get("index", "admin\AdminController@getIndexPage");
	Route::get("logout", "admin\AdminController@logout");
	Route::group(["prefix" => "category"], function(){
		Route::get("add", "admin\CategoryController@getAddCategoryForm");
		Route::post("add", "admin\CategoryController@postAddCategory");
		Route::get("list", "admin\CategoryController@getListCategoryForm");
		Route::get("delete/{id}", "admin\CategoryController@deleteCategory");
		Route::get("edit/{id}", "admin\CategoryController@getEditCategory");
		Route::post("edit/{id}", "admin\CategoryController@postEditCategory");
	});


	Route::group(["prefix" => "post"], function(){
		Route::get("edit/{id}", "admin\PostController@getEditPost");
		Route::post("edit/{id}", "admin\PostController@postEditPost");
		Route::get("delete/{id}", "admin\PostController@deletePost");
		Route::get("list", "admin\PostController@getListPost");
		Route::get("add", "admin\PostController@getAddPost");
		Route::post("add", "admin\PostController@postAddPost");
	});

	Route::group(["prefix" => "document"], function(){
		Route::get("edit/{id}", "admin\DocumentController@getEditDocumentForm");
		Route::post("edit/{id}", "admin\DocumentController@postEditDocument");
		Route::get("add", "admin\DocumentController@getAddDocument");
		Route::post("add", "admin\DocumentController@postAddDocument");
		Route::get("list", "admin\DocumentController@getListDocument");
		
	});
});