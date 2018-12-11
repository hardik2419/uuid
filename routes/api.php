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

    /* Company API */
    Route::resource('company', 'CompanyController')->except(['create', 'edit']);

    /* Location API */
    Route::resource('location', 'LocationController')->except(['create', 'edit']);

    /* Certifications API */
    Route::resource('certificate', 'CertificateController')->except(['create', 'edit']);

    /* Certifications API */
    Route::resource('accolade', 'AccoladesController')->except(['create', 'edit']);
    /* Services API */
    Route::resource('services', 'ServicesController')->except(['create', 'edit']);
});
