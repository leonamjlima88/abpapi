<?php

namespace App\Modules\Financial\Bank\Mapper;

use App\Modules\Financial\Bank\Dto\BankDto;
use App\Modules\Financial\Bank\Entity\Bank;

class BankMapper
{
  public static function mapDtoToEntity(BankDto $bankDto): Bank 
  {
    return new Bank(...$bankDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Bank
  {
    return new Bank(...$data);
  }  

  public static function mapEntityToDto(Bank $bankEntity): BankDto 
  {
    return BankDto::from(objectToArray($bankEntity));
  }  
}