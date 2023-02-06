<?php

namespace App\Modules\General\City\UseCase;

use App\Modules\General\City\Dto\CityDto;
use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\City\Repository\CityRepositoryInterface;

class CityStoreAndShowUseCase
{
  public function __construct(
    private readonly CityRepositoryInterface $cityRepository
  ){    
  }
  
  public function execute(CityDto $cityDto): CityDto 
  {
    $cityEntity = CityMapper::mapDtoToEntity($cityDto);
    $storedId = $this->cityRepository->store($cityEntity);
    $cityEntityFound = $this->cityRepository->show($storedId);
    
    return CityMapper::mapEntityToDto($cityEntityFound);
  }
}
