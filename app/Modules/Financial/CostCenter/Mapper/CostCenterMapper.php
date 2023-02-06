<?php

namespace App\Modules\Financial\CostCenter\Mapper;

use App\Modules\Financial\CostCenter\Dto\CostCenterDto;
use App\Modules\Financial\CostCenter\Entity\CostCenter;
use Illuminate\Support\Arr;

class CostCenterMapper
{
  public static function mapDtoToEntity(CostCenterDto $cost_centerDto): CostCenter 
  {
    return new CostCenter(...$cost_centerDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): CostCenter
  {
    return new CostCenter(...$data);
  }  

  public static function mapEntityToDto(CostCenter $cost_centerEntity): CostCenterDto 
  {
    return CostCenterDto::from(objectToArray($cost_centerEntity));
  }  
}