<?php

namespace App\Modules\Fiscal\OperationType\Mapper;

use App\Modules\Fiscal\OperationType\Dto\OperationTypeDto;
use App\Modules\Fiscal\OperationType\Entity\OperationType;

class OperationTypeMapper
{
  public static function mapDtoToEntity(OperationTypeDto $operation_typeDto): OperationType 
  {
    return new OperationType(...$operation_typeDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): OperationType
  {
    return new OperationType(...$data);
  }  

  public static function mapEntityToDto(OperationType $operation_typeEntity): OperationTypeDto 
  {
    return OperationTypeDto::from(objectToArray($operation_typeEntity));
  }  
}