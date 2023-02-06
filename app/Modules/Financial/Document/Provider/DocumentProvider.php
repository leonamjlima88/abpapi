<?php

namespace App\Modules\Financial\Document\Provider;

use App\Modules\Financial\Document\Repository\Eloquent\DocumentRepositoryEloquent;
use App\Modules\Financial\Document\Repository\Eloquent\Model\DocumentModelEloquent;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;
use App\Modules\Financial\Document\Repository\Memory\DocumentRepositoryMemory;
use App\Shared\Repository\RepositoryTypeEnum;
use Illuminate\Support\ServiceProvider;

class DocumentProvider extends ServiceProvider
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
      RepositoryTypeEnum::ELOQUENT => $this->app->bind(DocumentRepositoryInterface::class, fn () => new DocumentRepositoryEloquent(new DocumentModelEloquent())),
      RepositoryTypeEnum::MEMORY   => $this->app->bind(DocumentRepositoryInterface::class, fn () => new DocumentRepositoryMemory()),
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
