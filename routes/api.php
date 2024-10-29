<?php

use App\Http\Controllers\AllyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('ally', AllyController::class);

Route::get('category/{category}/products', [CategoryController::class, 'getProducts']);
Route::get('ally/{ally}/products', [AllyController::class, 'products']);