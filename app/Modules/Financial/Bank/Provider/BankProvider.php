<?php

namespace App\Modules\Financial\Bank\Provider;

use App\Modules\Financial\Bank\Repository\Eloquent\BankRepositoryEloquent;
use App\Modules\Financial\Bank\Repository\Eloquent\Model\BankModelEloquent;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;
use App\Modules\Financial\Bank\Repository\Memory\BankRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class BankProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(BankRepositoryInterface::class, fn () => new BankRepositoryEloquent(new BankModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(BankRepositoryInterface::class, fn () => new BankRepositoryMemory()),
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
