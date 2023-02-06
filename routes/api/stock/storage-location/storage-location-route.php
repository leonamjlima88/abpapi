<?php

use App\Modules\Stock\StorageLocation\Controller\StorageLocationController;
use Illuminate\Support\Facades\Route;

/**
 * StorageLocation (Local de Armazenamento)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("storage-location/index",  [StorageLocationController::class, 'index'])->name("stock-storage-location.index");
    Route::post("storage-location",        [StorageLocationController::class, 'store'])->name("stock-storage-location.store");
    Route::get("storage-location/{id}",    [StorageLocationController::class, 'show'])->name("stock-storage-location.show");
    Route::put("storage-location/{id}",    [StorageLocationController::class, 'update'])->name("stock-storage-location.update");
    Route::delete("storage-location/{id}", [StorageLocationController::class, 'destroy'])->name("stock-storage-location.destroy");  
  }
);
