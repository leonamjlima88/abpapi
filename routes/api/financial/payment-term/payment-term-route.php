<?php

use App\Modules\Financial\PaymentTerm\Controller\PaymentTermController;
use Illuminate\Support\Facades\Route;

/**
 * PaymentTerm (Condição de pagamento)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("payment-term/index",  [PaymentTermController::class, 'index'])->name("financial-payment-term.index");
    Route::post("payment-term",        [PaymentTermController::class, 'store'])->name("financial-payment-term.store");
    Route::get("payment-term/{id}",    [PaymentTermController::class, 'show'])->name("financial-payment-term.show");
    Route::put("payment-term/{id}",    [PaymentTermController::class, 'update'])->name("financial-payment-term.update");
    Route::delete("payment-term/{id}", [PaymentTermController::class, 'destroy'])->name("financial-payment-term.destroy");  
  }
);
