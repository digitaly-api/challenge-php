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

$router->post('/people', 'PeopleController@store');
$router->put('/people/{id}', 'PeopleController@update');
$router->patch('/people/{id}', 'PeopleController@update');
$router->delete('/people/{id}', 'PeopleController@destroy');
$router->get('/people[/{id}]', 'PeopleController@show');

$router->post('/address', 'AddressController@store');
$router->put('/address/{id}', 'AddressController@update');
$router->patch('/address/{id}', 'AddressController@update');
$router->delete('/address/{id}', 'AddressController@destroy');
