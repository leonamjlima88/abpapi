<?php

namespace App\Modules\Financial\CostCenter\UseCase;

use App\Modules\Financial\CostCenter\Dto\CostCenterFilterDto;
use App\Modules\Financial\CostCenter\Entity\CostCenterFilter;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;

class CostCenterIndexUseCase
{
  public function __construct(
    private readonly CostCenterRepositoryInterface $cost_centerRepository
  ){    
  }
  
  public function execute(CostCenterFilterDto $cost_centerFilterDto): array
  {
    $cost_centerFilter = new CostCenterFilter(...$cost_centerFilterDto->toArray());
    return $this->cost_centerRepository->index($cost_centerFilter);
  }
}
