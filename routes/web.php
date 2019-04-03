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

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('person',  ['uses' => 'PersonController@showAll']);
    $router->get('person/{id}', ['uses' => 'PersonController@showOne']);
    $router->post('person', ['uses' => 'PersonController@create']);
    $router->delete('person/{id}', ['uses' => 'PersonController@delete']);
    $router->put('person/{id}', ['uses' => 'PersonController@update']);

    $router->get('address',  ['uses' => 'AddressController@showAll']);
    $router->get('address/{id}', ['uses' => 'AddressController@showOne']);
    $router->post('address', ['uses' => 'AddressController@create']);
    $router->delete('address/{id}', ['uses' => 'AddressController@delete']);
    $router->put('address/{id}', ['uses' => 'AddressController@update']);
});
