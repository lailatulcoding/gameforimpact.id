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

Route::group(['middleware' => ['auth']], function () {
    //Home Controller
    Route::get('/admin', 'Admin_controllers\HomeController@index')->name('admin');
    Route::get('/admin/informasi', 'Admin_controllers\HomeController@informasi')->name('informasi');
    Route::post('/admin/editinformasi/{id}',[ 'uses' => 'Admin_controllers\HomeController@editinfo', 'as' => 'editinfo']);
    Route::post('/admin/editkontak/{id}',[ 'uses' => 'Admin_controllers\HomeController@editkontak', 'as' => 'editkontak']);
    Route::get('/admin/videos', 'Admin_controllers\HomeController@videos')->name('videos');
    Route::get('/admin/proposal', 'Admin_controllers\HomeController@proposal')->name('proposal');
    Route::get('/admin/kontak', 'Admin_controllers\HomeController@kontak')->name('kontak');
});

//Route::get('/home', 'HomeController@index')->name('home');
