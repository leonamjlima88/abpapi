<?php

namespace App\Modules\Stock\Brand\Mapper;

use App\Modules\Stock\Brand\Dto\BrandDto;
use App\Modules\Stock\Brand\Entity\Brand;

class BrandMapper
{
  public static function mapDtoToEntity(BrandDto $brandDto): Brand 
  {
    return new Brand(...$brandDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Brand
  {
    return new Brand(...$data);
  }  

  public static function mapEntityToDto(Brand $brandEntity): BrandDto 
  {
    return BrandDto::from(objectToArray($brandEntity));
  }  
}