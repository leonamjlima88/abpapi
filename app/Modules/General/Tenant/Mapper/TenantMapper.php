<?php

namespace App\Modules\General\Tenant\Mapper;

use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\Tenant\Dto\TenantDto;
use App\Modules\General\Tenant\Entity\Tenant;

class TenantMapper
{
  public static function mapDtoToEntity(TenantDto $tenantDto): Tenant 
  {
    return new Tenant(...$tenantDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Tenant
  {
    $data['city'] = (isset($data['city']) && $data['city']) ? CityMapper::mapArrayToEntity($data['city']) : null;
    return new Tenant(...$data);
  }  

  public static function mapEntityToDto(Tenant $tenantEntity): TenantDto 
  {
    return TenantDto::from(objectToArray($tenantEntity));
  }  
}