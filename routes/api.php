<?php

use App\Http\Controllers\ExportProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchProduct;
use Illuminate\Support\Facades\Route;

// Basic CRUD operations
Route::apiResource('/products', ProductController::class);

// export data all products as "csv", "html", or "pdf"
Route::get('/products/export/{format}', ExportProduct::class);

// search products by some keywords,
// possible strategy: "exact", "like", "fulltext", "elasticsearch"
// strategy switchable by config
Route::get('/products/search', SearchProduct::class);
