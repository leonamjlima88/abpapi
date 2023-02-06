<?php

namespace App\Modules\Stock\StorageLocation\UseCase;

use App\Modules\Stock\StorageLocation\Dto\StorageLocationDto;
use App\Modules\Stock\StorageLocation\Mapper\StorageLocationMapper;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;

class StorageLocationUpdateAndShowUseCase
{
  public function __construct(
    private readonly StorageLocationRepositoryInterface $storage_locationRepository
  ){    
  }
  
  public function execute(int $id, StorageLocationDto $storage_locationDto): StorageLocationDto 
  {
    $storage_locationEntity = StorageLocationMapper::mapDtoToEntity($storage_locationDto);
    $this->storage_locationRepository->update($id, $storage_locationEntity);
    $storage_locationEntityFound = $this->storage_locationRepository->show($id);

    return StorageLocationMapper::mapEntityToDto($storage_locationEntityFound);
  }
}
