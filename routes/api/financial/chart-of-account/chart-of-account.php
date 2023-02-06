<?php

use App\Modules\Financial\ChartOfAccount\Controller\ChartOfAccountController;
use Illuminate\Support\Facades\Route;

/**
 * ChartOfAccount (Planos de conta)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("chart-of-account/index",  [ChartOfAccountController::class, 'index'])->name("financial-chart-of-account.index");
    Route::post("chart-of-account",        [ChartOfAccountController::class, 'store'])->name("financial-chart-of-account.store");
    Route::get("chart-of-account/{id}",    [ChartOfAccountController::class, 'show'])->name("financial-chart-of-account.show");
    Route::put("chart-of-account/{id}",    [ChartOfAccountController::class, 'update'])->name("financial-chart-of-account.update");
    Route::delete("chart-of-account/{id}", [ChartOfAccountController::class, 'destroy'])->name("financial-chart-of-account.destroy");  
  }
);
