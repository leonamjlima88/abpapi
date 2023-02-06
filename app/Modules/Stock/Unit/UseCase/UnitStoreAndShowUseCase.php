<?php

namespace App\Modules\Stock\Unit\UseCase;

use App\Modules\Stock\Unit\Dto\UnitDto;
use App\Modules\Stock\Unit\Mapper\UnitMapper;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;

class UnitStoreAndShowUseCase
{
  public function __construct(
    private readonly UnitRepositoryInterface $unitRepository
  ){    
  }
  
  public function execute(UnitDto $unitDto): UnitDto 
  {
    $unitEntity = UnitMapper::mapDtoToEntity($unitDto);
    $storedId = $this->unitRepository->store($unitEntity);
    $unitEntityFound = $this->unitRepository->show($storedId);
    
    return UnitMapper::mapEntityToDto($unitEntityFound);
  }
}
