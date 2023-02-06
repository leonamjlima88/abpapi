<?php

namespace App\Modules\Stock\Unit\UseCase;

use App\Modules\Stock\Unit\Dto\UnitFilterDto;
use App\Modules\Stock\Unit\Entity\UnitFilter;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;

class UnitIndexUseCase
{
  public function __construct(
    private readonly UnitRepositoryInterface $unitRepository
  ){    
  }
  
  public function execute(UnitFilterDto $unitFilterDto): array
  {
    $unitFilter = new UnitFilter(...$unitFilterDto->toArray());
    return $this->unitRepository->index($unitFilter);
  }
}
