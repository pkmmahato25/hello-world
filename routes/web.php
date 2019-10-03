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

Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category','CategoryController@index')->name('category.index');

Route::get('/category/{id}/edit','CategoryController@edit')->name('category.edit');
Route::POST('/category/{id}/update','CategoryController@update')->name('category.update');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::POST('/category/store','CategoryController@store')->name('category.store');

/***********subcategory***********************/
Route::get('/subcategory','SubCategoryController@index')->name('subcategory.index');
Route::get('/subcategory/create','SubCategoryController@create')->name('subcategory.create');
Auth::routes();


 

/*School Registration*/
Route::group(["prefix" =>"admin","namespace"=>"Admin"],function(){
    Route::get('/school/create','SchoolController@create')->name('school.create');
    Route::resource('/school','SchoolController');
    Route::POST('/school/{id}/update','SchoolController@update')->name('school.update');
    Route::POST('/school/{id}/destroy','SchoolController@destroy')->name('school.destroy');

    /*Student Registration*/
    Route::resource('/student','StudentController');
});

/*Student Registration*/

