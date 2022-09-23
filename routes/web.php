<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\WelcomeController;
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

/** Problem Error
 * Edit Pelanggan
 */


Auth::routes([
    'register' => false
]);

Route::get('/', [WelcomeController::class, 'index']);
Route::get('searching', [WelcomeController::class, 'search']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('welcome', [HomeController::class, 'index']);
Route::get('generate/{id}', [HomeController::class, 'generate']);

// Product
Route::get('product', [ProductController::class, 'index']);
Route::post('addproduct', [ProductController::class, 'store']);
Route::get('deleteproduct/{id}', [ProductController::class, 'destroy']);

// Invoice
Route::get('invoice/{id}', [CustomerController::class, 'show']);
Route::get('print/{id}', [CustomerController::class, 'print']);
Route::post('addcustomer/{id}', [CustomerController::class, 'store']);
Route::delete('deleteinv/{id}', [CustomerController::class, 'destroy']);

//  Invoice Produk
Route::get('nota/{id}', [NotaController::class, 'index']);
Route::patch('nota/{id}', [NotaController::class, 'store']);
Route::delete('notadelete/{id}', [NotaController::class, 'destroy']);

//  Pelanggan
Route::get('pelanggan', [PelangganController::class, 'index']);
Route::post('pelanggan', [PelangganController::class, 'store']);
Route::get('editpelanggan/{id}', [PelangganController::class, 'show']);
Route::patch('editpelanggan/{id}', [PelangganController::class, 'update']);
Route::delete('dltpelanggan/{id}', [PelangganController::class, 'destroy']);

// Staff
Route::get('staff', [StafController::class, 'index']);
Route::get('editstaff', [StafController::class, 'editprofil']);
// Route::patch('editstaff', [StafController::class, 'updateprofil']);
Route::patch('staffedit/{id}', [StafController::class, 'update']);
Route::group(['middleware' => ['role:admin']], function () {
    Route::post('staff', [StafController::class, 'store']);
    Route::get('staffedit/{id}', [StafController::class, 'edit']);
    Route::get('stdelete/{id}', [StafController::class, 'destroy']);
});
