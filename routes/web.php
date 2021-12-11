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

Route::get('/', 'PresetController@index')->name('preset.index');
Route::post('/preset', 'PresetController@create')->name('preset.create');
Route::post('/preset_enable', 'PresetController@enable')->name('preset.enable');

Route::get('/content', 'ContentController@index')->name('content.index');

Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category', 'CategoryController@create')->name('category.create');

Route::get('/tag', 'TagController@index')->name('tag.index');

Auth::routes();


//管理画面
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', 'DashbordController@index')->name('dashbord');

    //プリセット
    Route::prefix('preset')->name('preset.')->group(function (){
        Route::get('/', 'PresetController@index')->name('index');
        Route::get('/new', 'PresetController@new')->name('new');
        Route::post('/create', 'PresetController@create')->name('create');
    });

    //カテゴリー
    Route::prefix('category')->name('category.')->group(function (){
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/new', 'CategoryController@new')->name('new');
        Route::post('/create', 'CategoryController@create')->name('create');
    });

    //タグ
    Route::prefix('tag')->name('tag.')->group(function (){
        Route::get('/', 'TagController@index')->name('index');
        Route::get('/new', 'TagController@new')->name('new');
        Route::post('/create', 'TagController@create')->name('create');
    });

    //ファイル
    Route::prefix('file')->name('file.')->group(function (){
        Route::get('/', 'FileController@index')->name('index');
        Route::get('/new', 'FileController@new')->name('new');
    });
});
