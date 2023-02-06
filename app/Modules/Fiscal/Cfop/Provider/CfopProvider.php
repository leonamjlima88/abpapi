<?php

namespace App\Modules\Fiscal\Cfop\Provider;

use App\Modules\Fiscal\Cfop\Repository\Eloquent\CfopRepositoryEloquent;
use App\Modules\Fiscal\Cfop\Repository\Eloquent\Model\CfopModelEloquent;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;
use App\Modules\Fiscal\Cfop\Repository\Memory\CfopRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class CfopProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(CfopRepositoryInterface::class, fn () => new CfopRepositoryEloquent(new CfopModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(CfopRepositoryInterface::class, fn () => new CfopRepositoryMemory()),
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
