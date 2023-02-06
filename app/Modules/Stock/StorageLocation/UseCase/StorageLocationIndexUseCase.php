<?php

namespace App\Modules\Stock\StorageLocation\UseCase;

use App\Modules\Stock\StorageLocation\Dto\StorageLocationFilterDto;
use App\Modules\Stock\StorageLocation\Entity\StorageLocationFilter;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;

class StorageLocationIndexUseCase
{
  public function __construct(
    private readonly StorageLocationRepositoryInterface $storage_locationRepository
  ){    
  }
  
  public function execute(StorageLocationFilterDto $storage_locationFilterDto): array
  {
    $storage_locationFilter = new StorageLocationFilter(...$storage_locationFilterDto->toArray());
    return $this->storage_locationRepository->index($storage_locationFilter);
  }
}
