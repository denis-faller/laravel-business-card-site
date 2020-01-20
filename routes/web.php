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

Route::get('/', 'StaticPageController@index');

Auth::routes();

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/', 'AdminPageController@index')->name('adminIndex');

    Route::get('/static-page/create/show/', 'Admin\StaticPageController@create')->name('adminStaticPageCreate');

    Route::post('/static-page/create/', 'StaticPageController@create');
    
    Route::get('/static-page/edit/show/{id}', 'Admin\StaticPageController@edit')->name('adminStaticPageEdit');

    Route::post('/static-page/edit/{page}', 'StaticPageController@edit');
});

Route::get('/{url}', 'StaticPageController@show');