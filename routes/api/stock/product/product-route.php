<?php

use App\Modules\Stock\Product\Controller\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * Product (Product)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("product/index",  [ProductController::class, 'index'])->name("stock-product.index");
    Route::post("product",        [ProductController::class, 'store'])->name("stock-product.store");
    Route::get("product/{id}",    [ProductController::class, 'show'])->name("stock-product.show");
    Route::put("product/{id}",    [ProductController::class, 'update'])->name("stock-product.update");
    Route::delete("product/{id}", [ProductController::class, 'destroy'])->name("stock-product.destroy");  
  }
);