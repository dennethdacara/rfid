<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register',   'JwtAuth\AuthController@register')->name('register');
    Route::post('login',      'JwtAuth\AuthController@login')->name('login');
    Route::post('logout',     'JwtAuth\AuthController@logout');
    Route::post('refresh',    'JwtAuth\AuthController@refresh');
    Route::post('userDetails', 'JwtAuth\AuthController@userDetails');
});
