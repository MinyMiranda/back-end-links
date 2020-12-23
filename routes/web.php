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

    $router->group(['prefix' => 'links'], function () use ($router) {
        $router->post('/store',  ['uses' => 'LinkController@store']);
        $router->post('/update',  ['uses' => 'LinkController@update']);
        $router->delete('/delete/{id}',  ['uses' => 'LinkController@destroy']);
    });

    $router->group(['prefix' => 'redirects'], function () use ($router) {
        $router->get('/{id}',  ['uses' => 'RedirectController@get']);
        $router->post('/store',  ['uses' => 'RedirectController@store']);
        $router->post('/update',  ['uses' => 'RedirectController@update']);
        $router->delete('/delete/{id}',  ['uses' => 'RedirectController@destroy']);
    });
});

$router->get('/{route}',  ['uses' => 'RedirectController@routes']);


