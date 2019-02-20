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

// $router->get('/test',['middleware' => 'custauthph', function () use ($router) {
//     return $router->app->version();
// }]);

$router->group(['prefix' => 'api'], function () use ($router) {

    // API Customer
        // Register
            $router->post('register',['as'=>'register','uses'=>'CustomerController@register']);
        // Login
        // Logout
        // Show Profile
    // API Vendor
        // Register
        // Login
        // Show Profile
    // API Service
        // Get List Service
        // Get Jenis Service
    // API Kertas
        // Get List Kertas
    // API Kurir
        // Get List Kurir
    // API Transaksi
        // Create Transaksi ->need api_key
    // API Order
        // Filter
        // Review Order ->need api_key
    

});