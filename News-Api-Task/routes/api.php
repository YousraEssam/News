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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('users', 'App\Api\Controllers\UsersController@index');
});

$api->version('v1', function ($api) {
    $api->get('users/{id}', 'App\Api\Controllers\UsersController@show');
});

$api->version('v1', function ($api) {
    $api->get('news', 'App\Api\Controllers\NewsController@index');
});

$api->version('v1', function ($api) {
    $api->post('news/create', 'App\Api\Controllers\NewsController@store');
});

$api->version('v1', function ($api) {
    $api->post('news/edit/{id}', 'App\Api\Controllers\NewsController@update');
});

$api->version('v1', function ($api) {
    $api->get('news/{id}', 'App\Api\Controllers\NewsController@show');
});

$api->version('v1', function ($api) {
    $api->get('news/delete/{id}', 'App\Api\Controllers\NewsController@softDelete');
});
