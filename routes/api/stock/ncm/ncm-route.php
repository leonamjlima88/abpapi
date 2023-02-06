<?php

use App\Modules\Stock\Ncm\Controller\NcmController;
use Illuminate\Support\Facades\Route;

/**
 * Ncm (NCM)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("ncm/index",  [NcmController::class, 'index'])->name("stock-ncm.index");
    Route::post("ncm",        [NcmController::class, 'store'])->name("stock-ncm.store");
    Route::get("ncm/{id}",    [NcmController::class, 'show'])->name("stock-ncm.show");
    Route::put("ncm/{id}",    [NcmController::class, 'update'])->name("stock-ncm.update");
    Route::delete("ncm/{id}", [NcmController::class, 'destroy'])->name("stock-ncm.destroy");  
  }
);
