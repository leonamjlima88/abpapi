<?php

namespace App\Modules\General\City\UseCase;

use App\Modules\General\City\Dto\CityDto;
use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\City\Repository\CityRepositoryInterface;
use Exception;

class CityShowUseCase
{
  public function __construct(
    private readonly CityRepositoryInterface $cityRepository
  ){    
  }
  
  public function execute(int $id): ?CityDto
  {
    $cityEntityFound = $this->cityRepository->show($id);
    return $cityEntityFound 
      ? CityMapper::mapEntityToDto($cityEntityFound) 
      : null;
  }
}
