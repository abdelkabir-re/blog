<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/category', [CategoryController::class,"index"])->name("category.index");
Route::get('/category/create', [CategoryController::class,"create"])->name("category.create");
Route::post('/category', [CategoryController::class,"store"])->name("category.store");
Route::delete('/category/{category}', [CategoryController::class,"destroy"])->name("category.destroy");
Route::get('/category/{category}/edit', [CategoryController::class,"edit"])->name("category.edit");
Route::put('/category/{category}', [CategoryController::class,"update"])->name("category.update");



Route::get("/products",[ProductController::class,"index"])->name("products.index");
Route::get("/products/create",[ProductController::class,"create"])->name("products.create");
Route::post("/products",[ProductController::class,"store"])->name("products.store");
Route::get("/products/{product}/edit",[ProductController::class,"edit"])->name("products.edit");
Route::put("/products/{product}",[ProductController::class,"update"])->name("products.update");
Route::delete("/products/{product}",[ProductController::class,"destroy"])->name("products.destroy");
