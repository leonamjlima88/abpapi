<?php

namespace App\Modules\General\State\Mapper;

use App\Modules\General\State\Dto\StateDto;
use App\Modules\General\State\Entity\State;

class StateMapper
{
  public static function mapDtoToEntity(StateDto $stateDto): State 
  {
    return new State(...$stateDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): State
  {
    return new State(...$data);
  }  

  public static function mapEntityToDto(State $stateEntity): StateDto 
  {
    return StateDto::from(objectToArray($stateEntity));
  }  
}