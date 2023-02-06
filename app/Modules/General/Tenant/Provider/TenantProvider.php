<?php

namespace App\Modules\General\Tenant\Provider;

use App\Modules\General\Tenant\Repository\Eloquent\TenantRepositoryEloquent;
use App\Modules\General\Tenant\Repository\Eloquent\Model\TenantModelEloquent;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;
use App\Modules\General\Tenant\Repository\Memory\TenantRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class TenantProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(TenantRepositoryInterface::class, fn () => new TenantRepositoryEloquent(new TenantModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(TenantRepositoryInterface::class, fn () => new TenantRepositoryMemory()),
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
