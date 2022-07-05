<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogTagsController;


Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
    Route::get('/productcategory', [ProductCategoryController::class, 'index']);
    Route::get('/productcategory/{id}', [ProductCategoryController::class, 'show']);
    Route::post('/addproductcategory', [ProductCategoryController::class, 'store']);
    Route::put('/updatecategory/{id}',  [ProductCategoryController::class, 'update']);
    Route::delete('/deletecategory/{id}',  [ProductCategoryController::class, 'destroy']);
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
    //Cart 
    Route::post('/addcart',[CartController::class,'store']);
    Route::post('/showcart/{id}',[CartController::class,'show']);
    Route::post('/deletecart/{id}',[CartController::class,'destroy']);
    Route::post('/addorder',[OrderController::class,'store']);
    Route::post('/showorder/{id}',[OrderController::class,'show']);
    Route::post('/deleteorder/{id}',[OrderController::class,'destroy']);
    Route::post('/addorderdetails',[OrderdetailsController::class,'store']);
    // Route::post('/showod/{id}',[OrderDetailController::class,'showod']);
    // Route::post('/deleteod/{id}',[OrderDetailController::class,'deleteod']);
    Route::post('/addorderdetails',[OrderdetailsController::class,'store']);
    Route::get('/admin/order/{id}',[AdminController::class,'show']);
    Route::put('/admin/update-order/{id}',[AdminController::class,'update']);
    //Change password ecommerce
    Route::post('forgot-password',[NewPasswordController::class,'forgotPassword']);
    Route::post('reset-password', [NewPasswordController::class, 'reset']);
    //Search product
    Route::get('search/{product_name}',[SearchController::class,'search']);
    //Blog route
    Route::get('/Blog', [BlogController::class, 'index']);
    Route::get('/Blog/{id}', [BlogController::class, 'show']);
    Route::post('/addBlog', [BlogController::class, 'store']);
    Route::put('updateBlog/{id}',  [BlogController::class, 'update']);
    Route::delete('deleteBlog/{id}',  [BlogController::class, 'destroy']);
    Route::get('/BlogCategory', [BlogCategoryController::class, 'index']);
    Route::get('/BlogCategory/{id}', [BlogCategoryController::class, 'show']);
    Route::post('addCategory', [BlogCategoryController::class, 'store']);
    Route::put('updateCategory/{id}',  [BlogCategoryController::class, 'update']);
    Route::delete('deleteBlogCategory/{id}',  [BlogCategoryController::class, 'destroy']);
    Route::get('/BlogTags', [BlogTagsController::class, 'index']);
    Route::get('/BlogTags/{id}', [BlogTagsController::class, 'show']);
    Route::post('/addTags', [BlogTagsController::class, 'store']);
    Route::put('updateTags/{id}',  [BlogTagsController::class, 'update']);
    Route::delete('deleteTags/{id}',  [BlogTagsController::class, 'destroy']);
    Route::get('/BlogPostTag', [BlogTagsController::class, 'index']);
    Route::get('/BlogPostTag/{id}', [BlogTagsController::class, 'show']);
    Route::post('/addPostTags', [BlogTagsController::class, 'store']);
    Route::put('updatePostTags/{id}',  [BlogTagsController::class, 'update']);
    Route::delete('deletePostTags/{id}',  [BlogTagsController::class, 'destroy']);
   
});