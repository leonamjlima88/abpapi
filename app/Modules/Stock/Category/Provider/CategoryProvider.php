<?php

namespace App\Modules\Stock\Category\Provider;

use App\Modules\Stock\Category\Repository\Eloquent\CategoryRepositoryEloquent;
use App\Modules\Stock\Category\Repository\Eloquent\Model\CategoryModelEloquent;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;
use App\Modules\Stock\Category\Repository\Memory\CategoryRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(CategoryRepositoryInterface::class, fn () => new CategoryRepositoryEloquent(new CategoryModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(CategoryRepositoryInterface::class, fn () => new CategoryRepositoryMemory()),
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
