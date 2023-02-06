<?php

use App\Modules\Stock\Category\Controller\CategoryController;
use Illuminate\Support\Facades\Route;
/**
 * Category (Categoria)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("category/index",  [CategoryController::class, 'index'])->name("stock-category.index");
    Route::post("category",        [CategoryController::class, 'store'])->name("stock-category.store");
    Route::get("category/{id}",    [CategoryController::class, 'show'])->name("stock-category.show");
    Route::put("category/{id}",    [CategoryController::class, 'update'])->name("stock-category.update");
    Route::delete("category/{id}", [CategoryController::class, 'destroy'])->name("stock-category.destroy");  
  }
);
