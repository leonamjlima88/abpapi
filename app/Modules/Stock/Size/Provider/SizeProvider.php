<?php

namespace App\Modules\Stock\Size\Provider;

use App\Modules\Stock\Size\Repository\Eloquent\SizeRepositoryEloquent;
use App\Modules\Stock\Size\Repository\Eloquent\Model\SizeModelEloquent;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;
use App\Modules\Stock\Size\Repository\Memory\SizeRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class SizeProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(SizeRepositoryInterface::class, fn () => new SizeRepositoryEloquent(new SizeModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(SizeRepositoryInterface::class, fn () => new SizeRepositoryMemory()),
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
