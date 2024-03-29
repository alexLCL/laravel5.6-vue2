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
/**
 * 首页
 */
Route::get('/','Web\AppController@getApp')
    ->middleware('auth');


/**
 * 登录页面
 */
Route::get('/login','Web\AppController@getLogin' )
    ->name('login')
    ->middleware('guest');


/**
 * 认证
 */
Route::get( '/auth/{social}', 'Web\AuthenticationController@getSocialRedirect' )
    ->middleware('guest');

Route::get( '/auth/{social}/callback', 'Web\AuthenticationController@getSocialCallback' )
    ->middleware('guest');

