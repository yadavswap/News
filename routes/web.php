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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/category', function () {
    return view('frontend.category');
})->name('category');

Route::get('/article', function () {
    return view('frontend.article');
})->name('article');



// backend routes


Route::get('admin', function () {
    return view('backend.adminindex');
})->name('adminindex');

Route::get('category', function () {
    return view('backend.category');
})->name('category');

Route::get('view-table', function () {
    return view('backend.view-table');
})->name('view-table');


Route::get('menu', function () {
    return view('backend.menu');
})->name('menu');

Route::get('login', function () {
    return view('backend.login');
})->name('login');

Route::get('add-post', function () {
    return view('backend.add-post');
})->name('add-post');