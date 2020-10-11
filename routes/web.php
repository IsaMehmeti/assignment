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

// $router->get('/', function ()
// {
// 	 return \Illuminate\Support\Str::random(32);
// });
// $router->group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

// $router->post('login', 'AuthController@login');
// $router->post('logout', 'AuthController@logout');
// $router->post('refresh', 'AuthController@refresh');
// $router->post('me', 'AuthController@me');
   
// });
$router->group(['prefix' => 'api'], function () use ($router) {
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');
   $router->post('logout', 'AuthController@logout');
   // $router->get('profile', 'UserController@profile');
   // $router->get('users/{id}', 'UserController@singleUser');
   // $router->get('users', 'UserController@allUsers');



});