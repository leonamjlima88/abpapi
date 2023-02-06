<?php

namespace App\Modules\General\City\Provider;

use App\Modules\General\City\Repository\Eloquent\CityRepositoryEloquent;
use App\Modules\General\City\Repository\Eloquent\Model\CityModelEloquent;
use App\Modules\General\City\Repository\CityRepositoryInterface;
use App\Modules\General\City\Repository\Memory\CityRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class CityProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    // Instanciar repositório
    $type = RepositoryTypeEnum::from(env('DB_REPOSITORY', 'eloquent'));
    match ($type) {
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(CityRepositoryInterface::class, fn () => new CityRepositoryEloquent(new CityModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(CityRepositoryInterface::class, fn () => new CityRepositoryMemory()),
      RepositoryTypeEnum::OTHER    => null,
    };
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
