<?php

namespace App\Modules\General\City\UseCase;

use App\Modules\General\City\Dto\CityFilterDto;
use App\Modules\General\City\Entity\CityFilter;
use App\Modules\General\City\Repository\CityRepositoryInterface;

class CityIndexUseCase
{
  public function __construct(
    private readonly CityRepositoryInterface $cityRepository
  ){    
  }
  
  public function execute(CityFilterDto $cityFilterDto): array
  {
    $cityFilter = new CityFilter(...$cityFilterDto->toArray());
    return $this->cityRepository->index($cityFilter);
  }
}
