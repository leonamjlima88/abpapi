<?php

namespace App\Modules\Financial\BankAccount\Provider;

use App\Modules\Financial\BankAccount\Repository\Eloquent\BankAccountRepositoryEloquent;
use App\Modules\Financial\BankAccount\Repository\Eloquent\Model\BankAccountModelEloquent;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;
use App\Modules\Financial\BankAccount\Repository\Memory\BankAccountRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class BankAccountProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(BankAccountRepositoryInterface::class, fn () => new BankAccountRepositoryEloquent(new BankAccountModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(BankAccountRepositoryInterface::class, fn () => new BankAccountRepositoryMemory()),
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
