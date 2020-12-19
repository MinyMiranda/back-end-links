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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/',  ['as' => 'home', 'uses' => 'HomeController@index']);
    $router->post('/links/store',  ['as' => 'home', 'uses' => 'LinkController@store']);
    $router->put('/links/update/{id}',  ['as' => 'home', 'uses' => 'LinkController@update']);
    $router->delete('/links/delete/{id}',  ['as' => 'home', 'uses' => 'LinkController@destroy']);
});
