<?php

use App\Modules\General\Tenant\Controller\TenantController;
use Illuminate\Support\Facades\Route;

/**
 * Tenant (Inquilino)
 */
Route::group(
  ['prefix' => 'general', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("tenant/index",  [TenantController::class, 'index'])->name("general-tenant.index");
    Route::post("tenant",        [TenantController::class, 'store'])->name("general-tenant.store");
    Route::get("tenant/{id}",    [TenantController::class, 'show'])->name("general-tenant.show");
    Route::put("tenant/{id}",    [TenantController::class, 'update'])->name("general-tenant.update");
    Route::delete("tenant/{id}", [TenantController::class, 'destroy'])->name("general-tenant.destroy");  
  }
);
