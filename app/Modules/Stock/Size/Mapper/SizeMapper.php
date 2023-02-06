<?php

namespace App\Modules\Stock\Size\Mapper;

use App\Modules\Stock\Size\Dto\SizeDto;
use App\Modules\Stock\Size\Entity\Size;
use Illuminate\Support\Arr;

class SizeMapper
{
  public static function mapDtoToEntity(SizeDto $sizeDto): Size 
  {
    return new Size(...$sizeDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Size
  {
    return new Size(...$data);
  }  

  public static function mapEntityToDto(Size $sizeEntity): SizeDto 
  {
    return SizeDto::from(objectToArray($sizeEntity));
  }  
}