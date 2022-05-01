<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', [ProductsController::class, 'showProducts']);
Route::get('/products/create', [ProductsController::class, 'createProductView']);
Route::post('/products/create', [ProductsController::class, 'createProduct']);
Route::get('/products/update/{id}', [ProductsController::class, 'updateProductView']);
Route::post('/products/update', [ProductsController::class, 'updateProduct']);
Route::post('/products/delete', [ProductsController::class, 'deleteProduct']);
