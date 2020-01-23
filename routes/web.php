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

Auth::routes();

Route::get('/{url}', 'StaticPageController@show');
Route::resource('/', 'StaticPageController', ['only' => [
    'index'
]]);

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function() {
    
    Route::get('/pages/{page}/edit', 'Admin\StaticPageController@edit')->name('admin.StaticPage.edit');
    Route::patch('/pages/{page}', 'Admin\StaticPageController@update')->name('admin.StaticPage.update');
    Route::delete('/pages/{page}', 'Admin\StaticPageController@destroy');
    Route::resource('/pages/', 'Admin\StaticPageController', ['only' => [
        'index', 'create', 'store'
    ],
    'names' => [
        'index' => 'admin.StaticPage.index', 
        'create' => 'admin.StaticPage.create', 
        'store' => 'admin.StaticPage.store'
    ]]);

    Route::get('/sites/{site}/edit/', 'Admin\SiteController@edit')->name('admin.Site.edit');
    Route::patch('/sites/{site}', 'Admin\SiteController@update')->name('admin.Site.update');
    Route::resource('/sites/', 'Admin\SiteController', ['only' => [
        'index'
    ],
    'names' => [
        'index' => 'admin.Site.index' 
    ]]);
});