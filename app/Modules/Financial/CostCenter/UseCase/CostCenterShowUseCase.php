<?php

namespace App\Modules\Financial\CostCenter\UseCase;

use App\Modules\Financial\CostCenter\Dto\CostCenterDto;
use App\Modules\Financial\CostCenter\Mapper\CostCenterMapper;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;

class CostCenterShowUseCase
{
  public function __construct(
    private readonly CostCenterRepositoryInterface $cost_centerRepository
  ){    
  }
  
  public function execute(int $id): ?CostCenterDto
  {
    $cost_centerEntityFound = $this->cost_centerRepository->show($id);
    return $cost_centerEntityFound 
      ? CostCenterMapper::mapEntityToDto($cost_centerEntityFound) 
      : null;
  }
}
