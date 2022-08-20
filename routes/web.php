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

$router->get('/products', [
    'as' => 'products', 'uses' => 'ProductController@index'
]);
$router->get('products/show/{id}', [
    'as' => 'products', 'uses' => 'ProductController@show'
]);
$router->post('/products/store', [
    'as' => 'store', 'uses' => 'ProductController@store'
]);
$router->post('products/update/{id}', [
    'as' => 'update', 'uses' => 'ProductController@update'
]);
$router->delete('products/destroy/{id}', [
    'as' => 'destroy', 'uses' => 'ProductController@destroy'
]);



// $router->get('/products',  ['ProductController@index']);

// $router->get('/products/{id}',  ['ProductController@show']);

// $router->post('/products/create',  ['ProductController@store']);

// $router->post('/products/update/{id}',  ['ProductController@update']);

// $router->delete('/products/delete/{id}',  ['ProductController@destroy']);



// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });




