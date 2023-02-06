<?php

use App\Modules\Financial\CostCenter\Controller\CostCenterController;
use Illuminate\Support\Facades\Route;

/**
 * CostCenter (Centro de Custo)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("cost-center/index",  [CostCenterController::class, 'index'])->name("financial-cost-center.index");
    Route::post("cost-center",        [CostCenterController::class, 'store'])->name("financial-cost-center.store");
    Route::get("cost-center/{id}",    [CostCenterController::class, 'show'])->name("financial-cost-center.show");
    Route::put("cost-center/{id}",    [CostCenterController::class, 'update'])->name("financial-cost-center.update");
    Route::delete("cost-center/{id}", [CostCenterController::class, 'destroy'])->name("financial-cost-center.destroy");  
  }
);
