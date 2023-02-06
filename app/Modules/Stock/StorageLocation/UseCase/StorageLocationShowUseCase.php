<?php

namespace App\Modules\Stock\StorageLocation\UseCase;

use App\Modules\Stock\StorageLocation\Dto\StorageLocationDto;
use App\Modules\Stock\StorageLocation\Mapper\StorageLocationMapper;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;

class StorageLocationShowUseCase
{
  public function __construct(
    private readonly StorageLocationRepositoryInterface $storage_locationRepository
  ){    
  }
  
  public function execute(int $id): ?StorageLocationDto
  {
    $storage_locationEntityFound = $this->storage_locationRepository->show($id);
    return $storage_locationEntityFound 
      ? StorageLocationMapper::mapEntityToDto($storage_locationEntityFound) 
      : null;
  }
}
