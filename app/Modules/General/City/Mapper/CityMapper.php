<?php

namespace App\Modules\General\City\Mapper;

use App\Modules\General\City\Dto\CityDto;
use App\Modules\General\City\Entity\City;
use App\Modules\General\State\Mapper\StateMapper;

class CityMapper
{
  public static function mapDtoToEntity(CityDto $cityDto): City 
  {
    return new City(...$cityDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): City
  {
    $data['state'] = (isset($data['state']) && $data['state']) ? StateMapper::mapArrayToEntity($data['state']) : null;
    return new City(...$data);
  }  

  public static function mapEntityToDto(City $cityEntity): CityDto 
  {
    return CityDto::from(objectToArray($cityEntity));
  }  
}