<?php

require_once __DIR__ . '/vendor/autoload.php';

use Proxy\Proxy;
use Proxy\Adapter\Guzzle\GuzzleAdapter;
use Proxy\Filter\RemoveEncodingFilter;
use Zend\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();

$guzzle = new GuzzleHttp\Client();

$proxy = new Proxy(new GuzzleAdapter($guzzle));
$proxy->filter(new RemoveEncodingFilter());

try {
    $response = $proxy->forward($request)->to('api-service:80');
}catch(\GuzzleHttp\Exception\ClientException $exception){
    $response = $exception->getResponse();
}

(new Zend\Diactoros\Response\SapiEmitter)->emit($response);