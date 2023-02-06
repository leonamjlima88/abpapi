<?php

namespace App\Modules\Stock\StorageLocation\Mapper;

use App\Modules\Stock\StorageLocation\Dto\StorageLocationDto;
use App\Modules\Stock\StorageLocation\Entity\StorageLocation;
use Illuminate\Support\Arr;

class StorageLocationMapper
{
  public static function mapDtoToEntity(StorageLocationDto $storage_locationDto): StorageLocation 
  {
    return new StorageLocation(...$storage_locationDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): StorageLocation
  {
    return new StorageLocation(...$data);
  }  

  public static function mapEntityToDto(StorageLocation $storage_locationEntity): StorageLocationDto 
  {
    return StorageLocationDto::from(objectToArray($storage_locationEntity));
  }  
}