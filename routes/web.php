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


//管理画面
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', 'DashbordController@index')->name('dashbord');

    //カテゴリー
    Route::prefix('category')->name('category.')->group(function (){
        Route::get('/', 'CategoryController@index')->name('index');
    });

    //タグ
    Route::prefix('tag')->name('tag.')->group(function (){
        Route::get('/', 'TagController@index')->name('index');
    });

    //ファイル
    Route::prefix('file')->name('file.')->group(function (){
        Route::get('/', 'FileController@index')->name('index');
    });
});
