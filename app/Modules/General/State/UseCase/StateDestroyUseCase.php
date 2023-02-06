<?php

namespace App\Modules\General\State\UseCase;

use App\Modules\General\State\Repository\StateRepositoryInterface;

class StateDestroyUseCase
{
  public function __construct(
    private readonly StateRepositoryInterface $stateRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->stateRepository->destroy($id);
  }
}
