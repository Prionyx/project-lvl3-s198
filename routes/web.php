<?php

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

$router->get('/', ['as' => 'home', 'uses' => 'UserController@showHome']);

$router->get('/domains/{id}', ['as' => 'domain', 'uses' => 'UserController@showNew']);

$router->get('/domains', ['as' => 'domains', 'uses' => 'UserController@show']);

$router->post('/domains', ['as' => 'domains', 'uses' => 'UserController@create']);
