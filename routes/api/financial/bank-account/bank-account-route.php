<?php

use App\Modules\Financial\BankAccount\Controller\BankAccountController;
use Illuminate\Support\Facades\Route;

/**
 * BankAccount (Conta Bancária)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("bank-account/index",  [BankAccountController::class, 'index'])->name("financial-bank-account.index");
    Route::post("bank-account",        [BankAccountController::class, 'store'])->name("financial-bank-account.store");
    Route::get("bank-account/{id}",    [BankAccountController::class, 'show'])->name("financial-bank-account.show");
    Route::put("bank-account/{id}",    [BankAccountController::class, 'update'])->name("financial-bank-account.update");
    Route::delete("bank-account/{id}", [BankAccountController::class, 'destroy'])->name("financial-bank-account.destroy");  
  }
);
