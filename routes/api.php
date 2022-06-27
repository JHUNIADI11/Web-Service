<?php

use App\Http\Controllers\CategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductConntroller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Tampil Customer
route::get('v1/customer',[CustomerController::class, 'index']);
//tampil berdasarkan id
route::get('v1/customer/{id}',[CustomerController::class, 'show']);
//validasi
Route::post('v1/customer',[CustomerController::class,'store']);
//updated
route::patch('v1/customer/{id}',[CustomerController::class, 'update']);
//delete
route::delete('v1/customer/{id}',[CustomerController::class, 'delete']);


// Tampil product
route::get('v1/product',[ProductConntroller::class, 'index']);
Route::get('v1/product/{id}', [ProductConntroller::class, 'show']);
Route::post('v1/product', [ProductConntroller::class, 'store']);
Route::put('v1/product/{id}', [ProductConntroller::class, 'update']);
Route::delete('v1/product/{id}', [ProductConntroller::class, 'destroy']);
//tes relasi antar tabel
Route::get('v1/producR', [ProductConntroller::class, 'indexRelasi']);

// tabel Categori
Route::get('v1/categori', [CategoriController::class, 'index']);
Route::get('v1/categori/{id}', [CategoriController::class, 'show']);
Route::post('v1/categori', [CategoriController::class, 'store']);
Route::put('v1/categori/{id}', [CategoriController::class, 'update']);
Route::delete('v1/categori/{id}', [CategoriController::class, 'destroy']);


//tampilan login setelah produk
Route::group([ 'middleware' => 'auth:api','prefix' => 'v1'], function ($router) {
    // Tampil product
route::get('product',[ProductConntroller::class, 'index']);
Route::get('product/{id}', [ProductConntroller::class, 'show']);
Route::post('product', [ProductConntroller::class, 'store']);
Route::put('product/{id}', [ProductConntroller::class, 'update']);
Route::delete('product/{id}', [ProductConntroller::class, 'destroy']);
//tes relasi antar tabel
Route::get('producR', [ProductConntroller::class, 'indexRelasi']);

// tabel Categori
Route::get('v1/categori', [CategoriController::class, 'index']);
Route::get('v1/categori/{id}', [CategoriController::class, 'show']);
Route::post('v1/categori', [CategoriController::class, 'store']);
Route::put('v1/categori/{id}', [CategoriController::class, 'update']);
Route::delete('v1/categori/{id}', [CategoriController::class, 'destroy']);

});

//route login
Route::group([ 'middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::get('password', function () {
        return bcrypt('jun123');

    });
});
