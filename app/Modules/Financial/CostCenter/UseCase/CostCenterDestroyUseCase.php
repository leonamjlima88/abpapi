<?php

namespace App\Modules\Financial\CostCenter\UseCase;

use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;

class CostCenterDestroyUseCase
{
  public function __construct(
    private readonly CostCenterRepositoryInterface $cost_centerRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->cost_centerRepository->destroy($id);
  }
}
