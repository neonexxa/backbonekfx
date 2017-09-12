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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('training','TrainingController');
Route::resource('carrier','CarrierController');
Route::get('setting','SettingController@index')->name('setting.index');

Route::post('settingcategory', 'SettingController@store_cat')->name('setting.store_cat');
Route::post('settinglevel', 'SettingController@store_lev')->name('setting.store_lev');
