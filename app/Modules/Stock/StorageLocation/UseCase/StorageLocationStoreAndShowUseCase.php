<?php

namespace App\Modules\Stock\StorageLocation\UseCase;

use App\Modules\Stock\StorageLocation\Dto\StorageLocationDto;
use App\Modules\Stock\StorageLocation\Mapper\StorageLocationMapper;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;

class StorageLocationStoreAndShowUseCase
{
  public function __construct(
    private readonly StorageLocationRepositoryInterface $storage_locationRepository
  ){    
  }
  
  public function execute(StorageLocationDto $storage_locationDto): StorageLocationDto 
  {
    $storage_locationEntity = StorageLocationMapper::mapDtoToEntity($storage_locationDto);
    $storedId = $this->storage_locationRepository->store($storage_locationEntity);
    $storage_locationEntityFound = $this->storage_locationRepository->show($storedId);
    
    return StorageLocationMapper::mapEntityToDto($storage_locationEntityFound);
  }
}
