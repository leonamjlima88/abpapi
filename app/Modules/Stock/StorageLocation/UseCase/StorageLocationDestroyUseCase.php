<?php

namespace App\Modules\Stock\StorageLocation\UseCase;

use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;

class StorageLocationDestroyUseCase
{
  public function __construct(
    private readonly StorageLocationRepositoryInterface $storage_locationRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->storage_locationRepository->destroy($id);
  }
}
