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
Route::get('article/{slug}', 'frontendController@article')->name('article');

Route::get('category', 'frontendController@category')->name('category');

Route::get('article', 'frontendController@article')->name('article');



// backend routes


Route::get('admin', 'adminController@adminindex')->name('adminindex');

Route::get('viewcategory', 'adminController@category')->name('category');
Route::get('set', 'adminController@settings')->name('settings');


Route::get('editcategory/{id}', 'adminController@editcategory')->name('editcategory');

Route::get('view-table', 'adminController@viewtable')->name('view-table');


Route::get('menu', 'adminController@menu')->name('menu');

Route::get('login', 'adminController@login')->name('login');



// crud controller

Route::post('addcategory','crudController@insertdata')->name('addcategory');
Route::post('updatecategory/{id}','crudController@updatedata')->name('updatecategory');
Route::post('multipledelete','adminController@multipledelete')->name('multipledelete');
Route::post('addsettings','crudController@insertdata')->name('addsettings');
// post


Route::get('addpost', 'adminController@addpost');
Route::post('addpost', 'crudController@insertdata');
Route::get('allposts', 'adminController@allposts');

Route::get('editposts/{id}', 'adminController@editposts')->name('editposts');
Route::post('updatepost/{id}','crudController@updatedata')->name('updateposts');
