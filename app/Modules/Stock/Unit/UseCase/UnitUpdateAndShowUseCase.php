<?php

namespace App\Modules\Stock\Unit\UseCase;

use App\Modules\Stock\Unit\Dto\UnitDto;
use App\Modules\Stock\Unit\Mapper\UnitMapper;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;

class UnitUpdateAndShowUseCase
{
  public function __construct(
    private readonly UnitRepositoryInterface $unitRepository
  ){    
  }
  
  public function execute(int $id, UnitDto $unitDto): UnitDto 
  {
    $unitEntity = UnitMapper::mapDtoToEntity($unitDto);
    $this->unitRepository->update($id, $unitEntity);
    $unitEntityFound = $this->unitRepository->show($id);

    return UnitMapper::mapEntityToDto($unitEntityFound);
  }
}
