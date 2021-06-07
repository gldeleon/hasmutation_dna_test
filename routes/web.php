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

$router->get('/', function () use ($router) {
    return "Desafío Sr. Full Stack Developer - Mutation DNA";
});

//$router->group(['middleware' => 'auth'], function () use ($router) {
$router->group(['prefix' => 'api/v1/dna'], function () use ($router) {
    $router->get('/stats', 'DnaController@stats');
    $router->post('/mutation', 'DnaController@hasMutation');
});

//});