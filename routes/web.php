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

Route::get('/', 'ContentController@index')->name('content.index');

Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category', 'CategoryController@create')->name('category.create');

Route::get('/tag', 'TagController@index')->name('tag.index');

Auth::routes();


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('dashbord', 'DashbordController@index')->name('dashbord');
});
