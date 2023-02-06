<?php

namespace App\Modules\Stock\Size\UseCase;

use App\Modules\Stock\Size\Dto\SizeFilterDto;
use App\Modules\Stock\Size\Entity\SizeFilter;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;

class SizeIndexUseCase
{
  public function __construct(
    private readonly SizeRepositoryInterface $sizeRepository
  ){    
  }
  
  public function execute(SizeFilterDto $sizeFilterDto): array
  {
    $sizeFilter = new SizeFilter(...$sizeFilterDto->toArray());
    return $this->sizeRepository->index($sizeFilter);
  }
}
