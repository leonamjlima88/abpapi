<?php

namespace App\Modules\Stock\Ncm\Mapper;

use App\Modules\Stock\Ncm\Dto\NcmDto;
use App\Modules\Stock\Ncm\Entity\Ncm;

class NcmMapper
{
  public static function mapDtoToEntity(NcmDto $ncmDto): Ncm 
  {
    return new Ncm(...$ncmDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Ncm
  {
    return new Ncm(...$data);
  }  

  public static function mapEntityToDto(Ncm $ncmEntity): NcmDto 
  {
    return NcmDto::from(objectToArray($ncmEntity));
  }  
}