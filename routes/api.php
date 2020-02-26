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

Route::middleware('auth:api')->group(function () {

   Route::apiResources([
       'products' => 'Api\ProductController',
       'posts' => 'Api\PostController',
       'users' => 'Api\UserController',
       '/users/{user}/posts' => 'Api\UserPostController',
        '/friend-request' => 'Api\FriendRequestController',
   ]);
   Route::get('auth-user', 'Api\AuthUserController@show');
});
