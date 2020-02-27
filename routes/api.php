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
      '/posts/{post}/like' => 'Api\PostLikeController',
      '/posts/{post}/comment' => 'Api\PostCommentController',
      'users' => 'Api\UserController',
      '/users/{user}/posts' => 'Api\UserPostController',
      '/user-images' => 'Api\UserImageController',
      '/friend-request' => 'Api\FriendRequestController',
      '/friend-request-response' => 'Api\FriendRequestResponseController',
   ]);
   Route::get('auth-user', 'Api\AuthUserController@show');
});
