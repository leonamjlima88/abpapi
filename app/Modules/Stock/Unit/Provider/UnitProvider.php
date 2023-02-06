<?php

namespace App\Modules\Stock\Unit\Provider;

use App\Modules\Stock\Unit\Repository\Eloquent\UnitRepositoryEloquent;
use App\Modules\Stock\Unit\Repository\Eloquent\Model\UnitModelEloquent;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;
use App\Modules\Stock\Unit\Repository\Memory\UnitRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class UnitProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(UnitRepositoryInterface::class, fn () => new UnitRepositoryEloquent(new UnitModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(UnitRepositoryInterface::class, fn () => new UnitRepositoryMemory()),
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
