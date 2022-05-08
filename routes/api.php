<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
    Route::get('/productcategory', [ProductCategoryController::class, 'index']);
    Route::get('/productcategory/{id}', [ProductCategoryController::class, 'show']);
    Route::post('/addproductcategory', [ProductCategoryController::class, 'store']);
    Route::put('updatecategory/{id}',  [ProductCategoryController::class, 'update']);
    Route::delete('delete/{id}',  [ProductCategoryController::class, 'destroy']);
    Route::get('/productsubcategory', [ProductCategoryController::class, 'index']);
    Route::get('/productsubcategory/{id}', [ProductCategoryController::class, 'show']);
    Route::post('/addproductsubcategory', [ProductSubCategoryController::class, 'store']);
    Route::put('updatesubcategory/{id}',  [ProductSubCategoryController::class, 'update']);
    Route::delete('deletesubcategory/{id}',  [ProductSubCategoryController::class, 'destroy']);
    Route::get('/products', [ProductCategoryController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/addproducts', [ProductController::class, 'store']);
    Route::put('updateproducts/{id}',  [ProductController::class, 'update']);
    Route::delete('deleteproducts/{id}',  [ProductController::class, 'destroy']);
});