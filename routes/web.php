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

Route::get('contact', 'frontendController@contact');

Route::get('newhome/{id}', 'frontendController@article')->name('index');
Route::get('new', 'frontendController@new')->name('index');


Route::get('/', 'frontendController@index')->name('index');
Route::get('article/{id}', 'frontendController@article')->name('article');
Route::get('page/{slug}', 'frontendController@page')->name('page');

Route::get('category', 'frontendController@category')->name('category');
Route::get('category/{slug}', 'frontendController@category')->name('category');

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
Route::get('search_content','frontController@searchContent');

// page

Route::get('addpage', 'adminController@addpage');
Route::post('addpage', 'crudController@insertdata');
Route::get('allpages', 'adminController@allpages');

Route::get('editpages/{id}', 'adminController@editpages')->name('editpages');
Route::post('updatepage/{id}','crudController@updatedata')->name('updatepages');
// Route::get('contact','frontController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');
// 

Route::get('addads', 'adminController@addads');
Route::post('addads', 'crudController@insertdata');
Route::get('allads', 'adminController@allads');

Route::get('editads/{id}', 'adminController@editads')->name('editposts');
Route::post('updateads/{id}','crudController@updatedata')->name('updateposts');
