<?php

namespace App\Modules\Fiscal\OperationType\Repository\Memory;

use App\Modules\Fiscal\OperationType\Entity\OperationTypeFilter;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class OperationTypeRepositoryMemory extends BaseRepositoryMemory implements OperationTypeRepositoryInterface
{
  public function index(?OperationTypeFilter $operation_typeFilter = null): array
  {
    return (array) $this->list;
  }
}