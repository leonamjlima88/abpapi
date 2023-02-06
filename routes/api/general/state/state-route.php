<?php

use App\Modules\General\State\Controller\StateController;
use Illuminate\Support\Facades\Route;

/**
 * State (Estado)
 */
Route::group(
  ['prefix' => 'general', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("state/index",  [StateController::class, 'index'])->name("general-state.index");
    Route::get("state/{id}",    [StateController::class, 'show'])->name("general-state.show");
  }
);
