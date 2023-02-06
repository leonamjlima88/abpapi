<?php

use App\Modules\Stock\Unit\Controller\UnitController;
use Illuminate\Support\Facades\Route;

/**
 * Unit (Unidade de Medida)
 */
Route::group(
  ['prefix' => 'stock', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("unit/index",  [UnitController::class, 'index'])->name("stock-unit.index");
    Route::post("unit",        [UnitController::class, 'store'])->name("stock-unit.store");
    Route::get("unit/{id}",    [UnitController::class, 'show'])->name("stock-unit.show");
    Route::put("unit/{id}",    [UnitController::class, 'update'])->name("stock-unit.update");
    Route::delete("unit/{id}", [UnitController::class, 'destroy'])->name("stock-unit.destroy");  
  }
);
