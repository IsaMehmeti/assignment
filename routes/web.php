<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'user'], function () use ($router) {
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');
   $router->post('logout', 'AuthController@logout');
   $router->get('users', 'AuthController@allUsers');
   $router->post('refresh', 'AuthController@refresh');
   $router->get('me', 'AuthController@me');
   $router->post('post/create', 'PostController@store');
   $router->get('post/show', 'PostController@show');
   $router->put('post/{id}', 'PostController@update');
   $router->delete('post/{id}', 'PostController@destroy');
   $router->get('posts', 'PostController@index');
   $router->post('post/{id}/reply/create', 'ReplyController@store');

});

 $router->group(['namespace' => 'Admin','prefix' => 'admin/'], function () use ($router) {
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');
   $router->post('logout', 'AuthController@logout');
   $router->get('users', 'AuthController@allUsers');
   $router->post('refresh', 'AuthController@refresh');
   $router->get('me', 'AuthController@me');
   $router->delete('post/{id}', 'PostController@destroy');
 });
