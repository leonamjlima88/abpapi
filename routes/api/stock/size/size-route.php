<?php

use App\Modules\Stock\Size\Controller\SizeController;
use Illuminate\Support\Facades\Route;

/**
 * Size (Tamanho)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("size/index",  [SizeController::class, 'index'])->name("stock-size.index");
    Route::post("size",        [SizeController::class, 'store'])->name("stock-size.store");
    Route::get("size/{id}",    [SizeController::class, 'show'])->name("stock-size.show");
    Route::put("size/{id}",    [SizeController::class, 'update'])->name("stock-size.update");
    Route::delete("size/{id}", [SizeController::class, 'destroy'])->name("stock-size.destroy");  
  }
);
