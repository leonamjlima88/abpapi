<?php

namespace App\Modules\General\State\Provider;

use App\Modules\General\State\Repository\Eloquent\StateRepositoryEloquent;
use App\Modules\General\State\Repository\Eloquent\Model\StateModelEloquent;
use App\Modules\General\State\Repository\StateRepositoryInterface;
use App\Modules\General\State\Repository\Memory\StateRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class StateProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(StateRepositoryInterface::class, fn () => new StateRepositoryEloquent(new StateModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(StateRepositoryInterface::class, fn () => new StateRepositoryMemory()),
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
