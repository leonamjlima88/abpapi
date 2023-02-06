<?php

namespace App\Modules\Financial\ChartOfAccount\Provider;

use App\Modules\Financial\ChartOfAccount\Repository\Eloquent\ChartOfAccountRepositoryEloquent;
use App\Modules\Financial\ChartOfAccount\Repository\Eloquent\Model\ChartOfAccountModelEloquent;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;
use App\Modules\Financial\ChartOfAccount\Repository\Memory\ChartOfAccountRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class ChartOfAccountProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(ChartOfAccountRepositoryInterface::class, fn () => new ChartOfAccountRepositoryEloquent(new ChartOfAccountModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(ChartOfAccountRepositoryInterface::class, fn () => new ChartOfAccountRepositoryMemory()),
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
