<?php

namespace App\Modules\Financial\CostCenter\UseCase;

use App\Modules\Financial\CostCenter\Dto\CostCenterDto;
use App\Modules\Financial\CostCenter\Mapper\CostCenterMapper;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;

class CostCenterUpdateAndShowUseCase
{
  public function __construct(
    private readonly CostCenterRepositoryInterface $cost_centerRepository
  ){    
  }
  
  public function execute(int $id, CostCenterDto $cost_centerDto): CostCenterDto 
  {
    $cost_centerEntity = CostCenterMapper::mapDtoToEntity($cost_centerDto);
    $this->cost_centerRepository->update($id, $cost_centerEntity);
    $cost_centerEntityFound = $this->cost_centerRepository->show($id);

    return CostCenterMapper::mapEntityToDto($cost_centerEntityFound);
  }
}
