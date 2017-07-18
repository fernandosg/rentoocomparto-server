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

$app->get('/', function () use ($app) {
    return $app->version();
});

/**
 * Routes for resource user
 */
$app->get('user', 'UsersController@all');
$app->get('user/{id}', 'UsersController@get');
$app->post('user', 'UsersController@add');
$app->put('user/{id}', 'UsersController@put');
$app->delete('user/{id}', 'UsersController@remove');

/**
 * Routes for resource place
 */
$app->get('place', 'PlacesController@all');
$app->get('place/{id}', 'PlacesController@get');
$app->post('place', 'PlacesController@add');
$app->put('place/{id}', 'PlacesController@put');
$app->delete('place/{id}', 'PlacesController@remove');
