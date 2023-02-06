<?php 

namespace App\Modules\Financial\CostCenter\Repository;

use App\Modules\Financial\CostCenter\Entity\CostCenterFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface CostCenterRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?CostCenterFilter $cost_centerFilter = null): array;
}
