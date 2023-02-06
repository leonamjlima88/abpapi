<?php

use App\Modules\Stock\Brand\Controller\BrandController;
use Illuminate\Support\Facades\Route;

/**
 * Brand (Marca)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("brand/index",  [BrandController::class, 'index'])->name("stock-brand.index");
    Route::post("brand",        [BrandController::class, 'store'])->name("stock-brand.store");
    Route::get("brand/{id}",    [BrandController::class, 'show'])->name("stock-brand.show");
    Route::put("brand/{id}",    [BrandController::class, 'update'])->name("stock-brand.update");
    Route::delete("brand/{id}", [BrandController::class, 'destroy'])->name("stock-brand.destroy");  
  }
);