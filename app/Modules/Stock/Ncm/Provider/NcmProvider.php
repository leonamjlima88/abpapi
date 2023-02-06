<?php

namespace App\Modules\Stock\Ncm\Provider;

use App\Modules\Stock\Ncm\Repository\Eloquent\NcmRepositoryEloquent;
use App\Modules\Stock\Ncm\Repository\Eloquent\Model\NcmModelEloquent;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;
use App\Modules\Stock\Ncm\Repository\Memory\NcmRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class NcmProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(NcmRepositoryInterface::class, fn () => new NcmRepositoryEloquent(new NcmModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(NcmRepositoryInterface::class, fn () => new NcmRepositoryMemory()),
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
