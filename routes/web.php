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


$app->options('{all:.*}', ['middleware' => 'CORS', function() {
    return response('');
}]);


/**
* Routes for login and some extra stuff.
*/
$app->post("login","PanelController@login");
$app->get("logout","PanelController@logout");
$app->post("signup/email","PanelController@signup");
$app->post("signup/fb","PanelController@signup_fb");

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
$app->get("place/city/{city_id}","PlacesController@by_city");
$app->post("place/characteristic","PlacesController@by_characteristic");
$app->get("place/latest/{count}","PlacesController@latest");

/**
 * Routes for resource state
 */
$app->get('state', 'StatesController@all');
$app->get('state/{id}', 'StatesController@get');
$app->post('state', 'StatesController@add');
$app->put('state/{id}', 'StatesController@put');
$app->delete('state/{id}', 'StatesController@remove');

/**
 * Routes for resource city
 */
$app->get('city', 'CitiesController@all');
$app->get('city/{id}', 'CitiesController@get');
$app->post('city', 'CitiesController@add');
$app->put('city/{id}', 'CitiesController@put');
$app->delete('city/{id}', 'CitiesController@remove');

/**
 * Routes for resource type
 */
$app->get('type', 'TypesController@all');
$app->get('type/{id}', 'TypesController@get');
$app->post('type', 'TypesController@add');
$app->put('type/{id}', 'TypesController@put');
$app->delete('type/{id}', 'TypesController@remove');

/**
 * Routes for resource offer
 */
$app->get('offer', 'OffersController@all');
$app->get('offer/{id}', 'OffersController@get');
$app->post('offer', 'OffersController@add');
$app->put('offer/{id}', 'OffersController@put');
$app->delete('offer/{id}', 'OffersController@remove');
