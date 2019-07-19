<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'=>'v1','middleware'=>'auth:api'],function (){

    /**
     * 当前登录的用户
     */
   Route::get('/user',function (Request $request){
       return $request->user();
   }) ;


   
});