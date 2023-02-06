<?php

use App\Modules\Fiscal\OperationType\Controller\OperationTypeController;
use Illuminate\Support\Facades\Route;

/**
 * OperationType (Banco)
 */
Route::group(
  ['prefix' => 'fiscal', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("operation-type/index",  [OperationTypeController::class, 'index'])->name("fiscal-operation-type.index");
    Route::post("operation-type",        [OperationTypeController::class, 'store'])->name("fiscal-operation-type.store");
    Route::get("operation-type/{id}",    [OperationTypeController::class, 'show'])->name("fiscal-operation-type.show");
    Route::put("operation-type/{id}",    [OperationTypeController::class, 'update'])->name("fiscal-operation-type.update");
    Route::delete("operation-type/{id}", [OperationTypeController::class, 'destroy'])->name("fiscal-operation-type.destroy");  
  }
);
