<?php

namespace App\Modules\General\City\UseCase;

use App\Modules\General\City\Dto\CityDto;
use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\City\Repository\CityRepositoryInterface;

class CityUpdateAndShowUseCase
{
  public function __construct(
    private readonly CityRepositoryInterface $cityRepository
  ){    
  }
  
  public function execute(int $id, CityDto $cityDto): CityDto 
  {
    $cityEntity = CityMapper::mapDtoToEntity($cityDto);
    $this->cityRepository->update($id, $cityEntity);
    $cityEntityFound = $this->cityRepository->show($id);

    return CityMapper::mapEntityToDto($cityEntityFound);
  }
}
