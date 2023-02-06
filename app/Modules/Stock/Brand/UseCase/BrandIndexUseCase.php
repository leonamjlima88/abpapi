<?php

namespace App\Modules\Stock\Brand\UseCase;

use App\Modules\Stock\Brand\Dto\BrandFilterDto;
use App\Modules\Stock\Brand\Entity\BrandFilter;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;

class BrandIndexUseCase
{
  public function __construct(
    private readonly BrandRepositoryInterface $brandRepository
  ){    
  }
  
  public function execute(BrandFilterDto $brandFilterDto): array
  {
    $brandFilter = new BrandFilter(...$brandFilterDto->toArray());
    return $this->brandRepository->index($brandFilter);
  }
}
