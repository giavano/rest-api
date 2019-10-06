<?php

// require 'vendor/autoload.php';

//  use Guzzle\Http\Client;

// $client = new Client();

// $response = $client->get('http://localhost:8080/rest-api/wpu-rest-server/api/account');
// // $response = $client->request('GET', 'http://localhost:8080/rest-api/wpu-rest-server/api/account');

// $contents = $response->getBody()->getContents();

// echo $contents;

$response = file_get_contents('http://localhost:8080/rest-api/wpu-rest-server/api/account');

echo $response;