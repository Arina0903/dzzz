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

Route::get("/gpov", "povController@getPov");
Route::post("/ppov", "povController@postPov");
Route::delete("/dpov", "povController@delPov");
Route::post("/rpov", "povController@regPov");
Route::post("/apov", "povController@authPov");
Route::post("/lpov", "povController@logPov");