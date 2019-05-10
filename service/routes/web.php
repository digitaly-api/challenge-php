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

$router->group(['prefix' => 'pessoas'], function () use ($router) {
    $router->get('/',  ['uses' => 'PessoasController@exibirTodos']);
    $router->get('/{id}', ['uses' => 'PessoasController@exibirUm']);
    $router->post('/', ['uses' => 'PessoasController@criar']);
    $router->delete('/{id}', ['uses' => 'PessoasController@deletar']);
    $router->put('/{id}', ['uses' => 'PessoasController@editar']);
    $router->patch('/{id}', ['uses' => 'PessoasController@editar']);

    $router->get('{id}/enderecos',  ['uses' => 'EnderecosController@exibirTodos']);
    $router->get('{id}/enderecos/{idEndereco}', ['uses' => 'EnderecosController@exibirUm']);
    $router->post('{id}/enderecos', ['uses' => 'EnderecosController@criar']);
    $router->delete('{id}/enderecos/{idEndereco}', ['uses' => 'EnderecosController@deletar']);
    $router->put('{id}/enderecos/{idEndereco}', ['uses' => 'EnderecosController@editar']);
    $router->patch('{id}/enderecos/{idEndereco}', ['uses' => 'EnderecosController@editar']);
});
