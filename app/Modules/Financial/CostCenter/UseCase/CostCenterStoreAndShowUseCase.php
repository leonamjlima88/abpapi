<?php

namespace App\Modules\Financial\CostCenter\UseCase;

use App\Modules\Financial\CostCenter\Dto\CostCenterDto;
use App\Modules\Financial\CostCenter\Mapper\CostCenterMapper;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;

class CostCenterStoreAndShowUseCase
{
  public function __construct(
    private readonly CostCenterRepositoryInterface $cost_centerRepository
  ){    
  }
  
  public function execute(CostCenterDto $cost_centerDto): CostCenterDto 
  {
    $cost_centerEntity = CostCenterMapper::mapDtoToEntity($cost_centerDto);
    $storedId = $this->cost_centerRepository->store($cost_centerEntity);
    $cost_centerEntityFound = $this->cost_centerRepository->show($storedId);
    
    return CostCenterMapper::mapEntityToDto($cost_centerEntityFound);
  }
}
