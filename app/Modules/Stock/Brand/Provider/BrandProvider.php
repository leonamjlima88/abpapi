<?php

namespace App\Modules\Stock\Brand\Provider;

use App\Modules\Stock\Brand\Repository\Eloquent\BrandRepositoryEloquent;
use App\Modules\Stock\Brand\Repository\Eloquent\Model\BrandModelEloquent;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;
use App\Modules\Stock\Brand\Repository\Memory\BrandRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class BrandProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(BrandRepositoryInterface::class, fn () => new BrandRepositoryEloquent(new BrandModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(BrandRepositoryInterface::class, fn () => new BrandRepositoryMemory()),
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
