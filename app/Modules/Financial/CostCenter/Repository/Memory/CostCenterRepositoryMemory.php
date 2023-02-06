<?php

namespace App\Modules\Financial\CostCenter\Repository\Memory;

use App\Modules\Financial\CostCenter\Entity\CostCenterFilter;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class CostCenterRepositoryMemory extends BaseRepositoryMemory implements CostCenterRepositoryInterface
{
  public function index(?CostCenterFilter $cost_centerFilter = null): array
  {
    return (array) $this->list;
  }
}