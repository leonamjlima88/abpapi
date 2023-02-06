<?php

namespace App\Modules\Stock\StorageLocation\Provider;

use App\Modules\Stock\StorageLocation\Repository\Eloquent\StorageLocationRepositoryEloquent;
use App\Modules\Stock\StorageLocation\Repository\Eloquent\Model\StorageLocationModelEloquent;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;
use App\Modules\Stock\StorageLocation\Repository\Memory\StorageLocationRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class StorageLocationProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(StorageLocationRepositoryInterface::class, fn () => new StorageLocationRepositoryEloquent(new StorageLocationModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(StorageLocationRepositoryInterface::class, fn () => new StorageLocationRepositoryMemory()),
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
