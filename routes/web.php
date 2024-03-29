<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function () {

    /* Auth google */
    Route::get('/auth/google', 'App\Http\Controllers\client\LoginController@redirectToGmail');
    Route::any('/auth/callback', 'App\Http\Controllers\client\LoginController@handleGmailCallback');
    Route::get('/auth/logout', 'App\Http\Controllers\client\LoginController@logout')->name('logout');

    /* Home et Products */
    Route::get('/', 'App\Http\Controllers\client\ProductController@getProductsByCategories')->name('home');
    Route::get('/productos', 'App\Http\Controllers\client\ProductController@getProductDetail')->name('productDetail');

    // Redeem points
    Route::get('/reclamar', 'App\Http\Controllers\client\OrderController@indexRedeem')->name('indexRedeem');
    Route::post('/reclamar', 'App\Http\Controllers\client\OrderController@redeemPoints')->name('redeemPoints');

    Route::post('/product', 'App\Http\Controllers\client\OrderController@orderProduct')->name('orderProduct');

    /* Footer links */
    Route::get('/términos-y-condiciones', 'App\Http\Controllers\client\LinkController@conditions')->name('conditions');
    Route::get('/política-de-envío', 'App\Http\Controllers\client\LinkController@envio')->name('envio');
    Route::get('/política-de-reembolso', 'App\Http\Controllers\client\LinkController@reembolso')->name('reembolso');
    Route::get('/política-de-privacidad', 'App\Http\Controllers\client\LinkController@privacidad')->name('privacidad');

    // Login Admin
    Route::get('/magikadmin', 'App\Http\Controllers\admin\LoginController@showLoginForm')->name('login');
    Route::post('/magikadmin', 'App\Http\Controllers\admin\LoginController@tryLogin')->name('tryLogin');

    /* Admin */
    Route::middleware(['auth'])->group(function () {
        // ADMINS
        Route::get('/magikadmin/code', 'App\Http\Controllers\admin\CodeController@index')->name('codeGenerator');
        Route::post('/magikadmin/code', 'App\Http\Controllers\admin\CodeController@generateCode')->name('generateCode');

        // Admin change pass
        Route::get('/magikadmin/credentials', 'App\Http\Controllers\admin\LoginController@indexEditor')->name('adminCredentials');
        Route::put('/magikadmin/credentials', 'App\Http\Controllers\admin\LoginController@editPassword')->name('passwordEdited');

        // Admin orders
        Route::get('/magikadmin/orders', 'App\Http\Controllers\admin\AdminOrderController@index')->name('orders');
        // Mettre à jour une commande
        Route::post('/magikadmin/orders/update-order', 'App\Http\Controllers\admin\AdminOrderController@update')->name('updateOrder');
        // Supprimer une commande
        Route::post('/magikadmin/orders/delete-order', 'App\Http\Controllers\admin\AdminOrderController@destroy')->name('deleteOrder');

        // Stocks
        Route::get('/magikadmin/stocks', 'App\Http\Controllers\admin\StocksController@index')->name('stocks');
        Route::post('/magikadmin/stocks', 'App\Http\Controllers\admin\StocksController@update')->name('updateStocks');

        // Logout
        Route::get('/magikadmin/logout', 'App\Http\Controllers\admin\LoginController@logout')->name('logout');
    });

    Route::fallback(function () {
        return redirect()->route('home'); 
    });
});