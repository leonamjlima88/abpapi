<?php

namespace App\Modules\Financial\CostCenter\Provider;

use App\Modules\Financial\CostCenter\Repository\Eloquent\CostCenterRepositoryEloquent;
use App\Modules\Financial\CostCenter\Repository\Eloquent\Model\CostCenterModelEloquent;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;
use App\Modules\Financial\CostCenter\Repository\Memory\CostCenterRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class CostCenterProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(CostCenterRepositoryInterface::class, fn () => new CostCenterRepositoryEloquent(new CostCenterModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(CostCenterRepositoryInterface::class, fn () => new CostCenterRepositoryMemory()),
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
