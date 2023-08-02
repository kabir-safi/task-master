<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\WebhookController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/invokable', WebhookController::class);
Route::post('/webhook', WebhookController::class)->name('webhook');

Route::get('/merchant/order-stats', [MerchantController::class, 'orderStats'])->name('merchant.order-stats');

Route::get('/merchant/index', [MerchantController::class, 'index'])->name('merchant.index');
Route::group(['prefix' => 'merchant'], function() {
    Route::get('/', 'MerchantController@index')->name('index');
    Route::get('/create', 'MerchantController@create')->name('merchant.create');
    Route::post('/create', 'MerchantController@store')->name('merchant.store');
    Route::get('/{merchant}/show', 'MerchantController@show')->name('merchant.show');
    Route::get('/{merchant}/edit', 'MerchantController@edit')->name('merchant.edit');
    Route::patch('/{merchant}/update', 'MerchantController@update')->name('merchant.update');
    Route::delete('/{merchant}/delete', 'MerchantController@destroy')->name('merchant.destroy');
});
