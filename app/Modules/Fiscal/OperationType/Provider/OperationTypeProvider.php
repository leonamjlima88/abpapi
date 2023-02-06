<?php

namespace App\Modules\Fiscal\OperationType\Provider;

use App\Modules\Fiscal\OperationType\Repository\Eloquent\OperationTypeRepositoryEloquent;
use App\Modules\Fiscal\OperationType\Repository\Eloquent\Model\OperationTypeModelEloquent;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;
use App\Modules\Fiscal\OperationType\Repository\Memory\OperationTypeRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class OperationTypeProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(OperationTypeRepositoryInterface::class, fn () => new OperationTypeRepositoryEloquent(new OperationTypeModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(OperationTypeRepositoryInterface::class, fn () => new OperationTypeRepositoryMemory()),
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
