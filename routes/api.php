<?php

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
}); */

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('verify', 'UserController@verifyEmail');
Route::post('forget-password', 'UserController@forgetPassword');
Route::post('set-password', 'UserController@setPassword');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
});

Route::match(['get', 'post'], 'botman', 'BotManController@handle');
