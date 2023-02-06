<?php

namespace App\Modules\General\State\UseCase;

use App\Modules\General\State\Dto\StateFilterDto;
use App\Modules\General\State\Entity\StateFilter;
use App\Modules\General\State\Repository\StateRepositoryInterface;

class StateIndexUseCase
{
  public function __construct(
    private readonly StateRepositoryInterface $stateRepository
  ){    
  }
  
  public function execute(StateFilterDto $stateFilterDto): array
  {
    $stateFilter = new StateFilter(...$stateFilterDto->toArray());
    return $this->stateRepository->index($stateFilter);
  }
}
