<?php

namespace App\Modules\General\State\UseCase;

use App\Modules\General\State\Dto\StateDto;
use App\Modules\General\State\Mapper\StateMapper;
use App\Modules\General\State\Repository\StateRepositoryInterface;

class StateStoreAndShowUseCase
{
  public function __construct(
    private readonly StateRepositoryInterface $stateRepository
  ){    
  }
  
  public function execute(StateDto $stateDto): StateDto 
  {
    $stateEntity = StateMapper::mapDtoToEntity($stateDto);
    $storedId = $this->stateRepository->store($stateEntity);
    $stateEntityFound = $this->stateRepository->show($storedId);
    
    return StateMapper::mapEntityToDto($stateEntityFound);
  }
}
