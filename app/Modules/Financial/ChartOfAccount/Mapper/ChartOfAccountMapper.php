<?php

namespace App\Modules\Financial\ChartOfAccount\Mapper;

use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountDto;
use App\Modules\Financial\ChartOfAccount\Entity\ChartOfAccount;

class ChartOfAccountMapper
{
  public static function mapDtoToEntity(ChartOfAccountDto $chart_of_accountDto): ChartOfAccount 
  {
    return new ChartOfAccount(...$chart_of_accountDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): ChartOfAccount
  {
    return new ChartOfAccount(...$data);
  }  

  public static function mapEntityToDto(ChartOfAccount $chart_of_accountEntity): ChartOfAccountDto 
  {
    return ChartOfAccountDto::from(objectToArray($chart_of_accountEntity));
  }  
}