<?php

namespace App\Modules\Stock\Product\Provider;

use App\Modules\Stock\Product\Repository\Eloquent\Model\ProductModelEloquent;
use App\Modules\Stock\Product\Repository\Eloquent\ProductRepositoryEloquent;
use App\Modules\Stock\Product\Repository\Memory\ProductRepositoryMemory;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(ProductRepositoryInterface::class, fn () => new ProductRepositoryEloquent(new ProductModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(ProductRepositoryInterface::class, fn () => new ProductRepositoryMemory()),
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
