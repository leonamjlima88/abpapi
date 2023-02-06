<?php

namespace App\Modules\General\State\UseCase;

use App\Modules\General\State\Dto\StateDto;
use App\Modules\General\State\Mapper\StateMapper;
use App\Modules\General\State\Repository\StateRepositoryInterface;
use Exception;

class StateShowUseCase
{
  public function __construct(
    private readonly StateRepositoryInterface $stateRepository
  ){    
  }
  
  public function execute(int $id): ?StateDto
  {
    $stateEntityFound = $this->stateRepository->show($id);
    return $stateEntityFound 
      ? StateMapper::mapEntityToDto($stateEntityFound) 
      : null;
  }
}
