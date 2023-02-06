<?php 

namespace App\Modules\Fiscal\OperationType\Repository;

use App\Modules\Fiscal\OperationType\Entity\OperationTypeFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface OperationTypeRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?OperationTypeFilter $operation_typeFilter = null): array;
}
