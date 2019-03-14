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

$router->get('/',['as'=>'custProfile','uses'=>'CustomerController@index']);

$router->group(['prefix' => 'api'], function () use ($router) {

    // API Customer
        // Register
            $router->post('customer-register',['as'=>'custReg','uses'=>'CustomerController@register']);
        // Login
            $router->post('customer-login',['as'=>'custLogin','uses'=>'CustomerController@login']);
        // Show Profile
            $router->get('customer-profile',['as'=>'custProfile','uses'=>'CustomerController@profile']);
    // API Vendor
        // Register
            $router->post('vendor-register',['as'=>'venReg','uses'=>'VendorController@register']);
        // Login
            $router->post('vendor-login',['as'=>'venLogin','uses'=>'VendorController@login']);
        // Show Profile
            $router->get('vendor-profile',['as'=>'venProfile','uses'=>'VendorController@profile']);
        // Filter
            $router->post('vendor-filter',['as'=>'filterVendor','uses'=>'VendorController@filter']);
        // Vendor Service Get
            $router->post('vendor-service',['as'=>'vendorService','uses'=>'VendorController@vendorService']);
    // API Master Data
        // Get List Service
            $router->get('service-get',['as'=>'getService','uses'=>'ServiceController@getService']);
        // Get Jenis Service
            $router->get('jenisservice-get',['as'=>'getJenisservice','uses'=>'ServiceController@getJenis']);
        // Get List Jenis Bahan
            $router->get('jenisbahan-get',['as'=>'getJenisbahan','uses'=>'BahanController@getJenisBahan']);
        // Get List Ukuran Bahan
            $router->get('ukuranbahan-get',['as'=>'getUkuranbahan','uses'=>'BahanController@getUkuranBahan']);
        // Get Finishing
            $router->get('finishing-get',['as'=>'getFinishing','uses'=>'BahanController@getFinishing']);
        // Get Kota
            $router->get('kota-get',['as'=>'getKota','uses'=>'BahanController@getKota']);
        // Get Kota
            $router->get('kurir-get',['as'=>'getKurir','uses'=>'BahanController@getKurir']);
    // API Transaksi
        // Create Transaksi dan Pesanan->need api_key
            $router->post('pesanan-store',['as'=>'storePesanan','middleware'=>'custauth','uses'=>'TransaksiController@storePesanan']);
        // Get Transaksi dan Pesanan->need api_key
            $router->get('pesanan-show',['as'=>'getPesanan','middleware'=>'custauth','uses'=>'TransaksiController@getPesanan']); 
        // Update Kurir Transaksi ->need api_key
            $router->put('kurir-trxupdate',['as'=>'updateTrxKurir','middleware'=>'custauth','uses'=>'TransaksiController@updateTrxKurir']);
        // Update Pesanan
            $router->put('pesanan-update',['as'=>'updatePesanan','middleware'=>'custauth','uses'=>'TransaksiController@updatePesanan']);
        // Transaksi Total
            $router->get('transaksi-total',['as'=>'totalTransaksi','middleware'=>'custauth','uses'=>'TransaksiController@totalTransaksi']);
    // API Order
        // Review Order ->need api_key
            $router->get('order-review',['as'=>'reviewOrder','middleware'=>'custauth','uses'=>'TransaksiController@reviewOrder']);
});