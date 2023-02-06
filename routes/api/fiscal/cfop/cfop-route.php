<?php

use App\Modules\Fiscal\Cfop\Controller\CfopController;
use Illuminate\Support\Facades\Route;

/**
 * Cfop
 */
Route::group(
  ['prefix' => 'fiscal', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("cfop/index",  [CfopController::class, 'index'])->name("fiscal-cfop.index");
    Route::post("cfop",        [CfopController::class, 'store'])->name("fiscal-cfop.store");
    Route::get("cfop/{id}",    [CfopController::class, 'show'])->name("fiscal-cfop.show");
    Route::put("cfop/{id}",    [CfopController::class, 'update'])->name("fiscal-cfop.update");
    Route::delete("cfop/{id}", [CfopController::class, 'destroy'])->name("fiscal-cfop.destroy");  
  }
);
