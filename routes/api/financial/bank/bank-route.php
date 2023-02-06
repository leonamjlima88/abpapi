<?php

use App\Modules\Financial\Bank\Controller\BankController;
use Illuminate\Support\Facades\Route;

/**
 * Bank (Banco)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("bank/index",  [BankController::class, 'index'])->name("financial-bank.index");
    Route::post("bank",        [BankController::class, 'store'])->name("financial-bank.store");
    Route::get("bank/{id}",    [BankController::class, 'show'])->name("financial-bank.show");
    Route::put("bank/{id}",    [BankController::class, 'update'])->name("financial-bank.update");
    Route::delete("bank/{id}", [BankController::class, 'destroy'])->name("financial-bank.destroy");  
  }
);
