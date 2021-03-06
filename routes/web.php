<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::view('/', 'auth.login');
Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/product', 'ProductController@index')
    ->name('product.index');

Route::middleware('auth')->group(function () {
    Route::get('/form/{product}', 'FormController@index')
        ->name('form.index');

    Route::post('/form/{product}', 'FormController@pay')
        ->name('form.pay');

    Route::get('/result/{reference}', 'PurchaseController@index')->name('purchase.index');
});


