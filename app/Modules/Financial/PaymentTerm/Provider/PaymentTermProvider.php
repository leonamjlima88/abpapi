<?php

namespace App\Modules\Financial\PaymentTerm\Provider;

use App\Modules\Financial\PaymentTerm\Repository\Eloquent\PaymentTermRepositoryEloquent;
use App\Modules\Financial\PaymentTerm\Repository\Eloquent\Model\PaymentTermModelEloquent;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;
use App\Modules\Financial\PaymentTerm\Repository\Memory\PaymentTermRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class PaymentTermProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(PaymentTermRepositoryInterface::class, fn () => new PaymentTermRepositoryEloquent(new PaymentTermModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(PaymentTermRepositoryInterface::class, fn () => new PaymentTermRepositoryMemory()),
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
