<?php

namespace App\Modules\Stock\Unit\UseCase;

use App\Modules\Stock\Unit\Dto\UnitDto;
use App\Modules\Stock\Unit\Mapper\UnitMapper;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;

class UnitShowUseCase
{
  public function __construct(
    private readonly UnitRepositoryInterface $unitRepository
  ){    
  }
  
  public function execute(int $id): ?UnitDto
  {
    $unitEntityFound = $this->unitRepository->show($id);
    return $unitEntityFound 
      ? UnitMapper::mapEntityToDto($unitEntityFound) 
      : null;
  }
}
