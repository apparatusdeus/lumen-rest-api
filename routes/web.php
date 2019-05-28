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
use Laravel\Lumen\Routing\Router;

/**
 * @var Router $router
 */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(
    [
        'prefix' => 'api/v1'
    ],
    function(\Laravel\Lumen\Routing\Router $router)
    {
        $router->get('customer','CustomerController@index');
        $router->post('customer','CustomerController@createCustomer');

        $router->put('customer/{id}','CustomerController@updateCustomer');
        $router->delete('customer/{id}','CustomerController@deleteCustomer');

        $router->get('transaction','TransactionController@index');
        $router->post('transaction','TransactionController@createTransaction');

        $router->put('transaction/{id}','TransactionController@updateTransaction');
        $router->delete('transaction/{id}','TransactionController@deleteTransaction');
    }
);