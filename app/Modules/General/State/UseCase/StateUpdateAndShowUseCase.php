<?php

namespace App\Modules\General\State\UseCase;

use App\Modules\General\State\Dto\StateDto;
use App\Modules\General\State\Mapper\StateMapper;
use App\Modules\General\State\Repository\StateRepositoryInterface;

class StateUpdateAndShowUseCase
{
  public function __construct(
    private readonly StateRepositoryInterface $stateRepository
  ){    
  }
  
  public function execute(int $id, StateDto $stateDto): StateDto 
  {
    $stateEntity = StateMapper::mapDtoToEntity($stateDto);
    $this->stateRepository->update($id, $stateEntity);
    $stateEntityFound = $this->stateRepository->show($id);

    return StateMapper::mapEntityToDto($stateEntityFound);
  }
}
