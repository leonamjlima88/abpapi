<?php

use App\Modules\General\City\Controller\CityController;
use Illuminate\Support\Facades\Route;

/**
 * City (Cidade)
 */
Route::group(
  ['prefix' => 'general', 'middleware' => ['auth:sanctum']],
  function () {
    Route::post("city/index",  [CityController::class, 'index'])->name("general-city.index");
    Route::get("city/{id}",    [CityController::class, 'show'])->name("general-city.show");
  }
);