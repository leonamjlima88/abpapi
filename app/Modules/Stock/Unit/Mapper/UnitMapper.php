<?php

namespace App\Modules\Stock\Unit\Mapper;

use App\Modules\Stock\Unit\Dto\UnitDto;
use App\Modules\Stock\Unit\Entity\Unit;
use Illuminate\Support\Arr;

class UnitMapper
{
  public static function mapDtoToEntity(UnitDto $unitDto): Unit 
  {
    return new Unit(...$unitDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Unit
  {
    return new Unit(...$data);
  }  

  public static function mapEntityToDto(Unit $unitEntity): UnitDto 
  {
    return UnitDto::from(objectToArray($unitEntity));
  }  
}