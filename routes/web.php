<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients;
use App\Http\Controllers\Deliveries;
use App\Http\Controllers\Orders;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/clients', [Clients::class, 'index'])->name('clients');
Route::get('/addclient', [Clients::class, 'addClient'])->name('addclient');
Route::put('/updateclient/{$client_id}', [Clients::class, 'updateClient'])->name('updateclient');
Route::get('/profile/{$client_id}', [Clients::class, 'profileHistory', ])->name('profile');
Route::post('/storeclient', [Clients::class, 'storeClient'])->name('storeclient');
Route::post('/updateExistingClient', [Clients::class, 'updateExistingClient'])->name('updateExistingClient');

Route::get('/orders', [Orders::class, 'index'])->name('orders');
Route::get('/addorder', [Orders::class, 'addOrder'])->name('addorder');
Route::get('/order/{$id}', [Orders::class, 'viewOrder'])->name('vieworder');
Route::get('/updateorder/{$order_id}', [Orders::class, 'updateOrder'])->name('updateorder');
Route::post('/storeorder', [Orders::class, 'storeOrder'])->name('storeorder');

Route::get('/deliveries', [Deliveries::class, 'index'])->name('deliveries');
Route::get('/adddelivery', [Deliveries::class, 'addDelivery'])->name('adddelivery');
Route::get('/delivery/{$id}', [Deliveries::class, 'viewDelivery'])->name('viewdelivery');
Route::post('/storedelivery', [Deliveries::class, 'storeDelivery'])->name('storedelivery');
// edit delivery


