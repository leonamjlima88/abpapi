<?php

use App\Modules\Financial\Document\Controller\DocumentController;
use Illuminate\Support\Facades\Route;

/**
 * Document (Banco)
 */
Route::group(
  ['prefix' => 'financial', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("document/index",  [DocumentController::class, 'index'])->name("financial-document.index");
    Route::post("document",        [DocumentController::class, 'store'])->name("financial-document.store");
    Route::get("document/{id}",    [DocumentController::class, 'show'])->name("financial-document.show");
    Route::put("document/{id}",    [DocumentController::class, 'update'])->name("financial-document.update");
    Route::delete("document/{id}", [DocumentController::class, 'destroy'])->name("financial-document.destroy");  
  }
);
