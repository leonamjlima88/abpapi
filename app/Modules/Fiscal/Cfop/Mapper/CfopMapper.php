<?php

namespace App\Modules\Fiscal\Cfop\Mapper;

use App\Modules\Fiscal\Cfop\Dto\CfopDto;
use App\Modules\Fiscal\Cfop\Entity\Cfop;

class CfopMapper
{
  public static function mapDtoToEntity(CfopDto $cfopDto): Cfop 
  {
    return new Cfop(...$cfopDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Cfop
  {
    return new Cfop(...$data);
  }  

  public static function mapEntityToDto(Cfop $cfopEntity): CfopDto 
  {
    return CfopDto::from(objectToArray($cfopEntity));
  }  
}