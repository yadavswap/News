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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'frontendController@index')->name('index');

Route::get('category', 'frontendController@category')->name('category');

Route::get('article', 'frontendController@article')->name('article');



// backend routes


Route::get('admin', 'adminController@adminindex')->name('adminindex');

Route::get('viewcategory', 'adminController@category')->name('category');
Route::get('settings', 'adminController@settings')->name('settings');


Route::get('editcategory/{id}', 'adminController@editcategory')->name('editcategory');

Route::get('view-table', 'adminController@viewtable')->name('view-table');


Route::get('menu', 'adminController@menu')->name('menu');

Route::get('login', 'adminController@login')->name('login');

Route::get('add-post', 'adminController@addpost')->name('add-post');


// crud controller

Route::post('addcategory','crudController@insertdata')->name('addcategory');
Route::post('updatecategory/{id}','crudController@updatedata')->name('updatecategory');
Route::post('multipledelete','adminController@multipledelete')->name('multipledelete');