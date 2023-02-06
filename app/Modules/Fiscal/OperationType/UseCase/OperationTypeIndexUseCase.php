<?php

namespace App\Modules\Fiscal\OperationType\UseCase;

use App\Modules\Fiscal\OperationType\Dto\OperationTypeFilterDto;
use App\Modules\Fiscal\OperationType\Entity\OperationTypeFilter;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;

class OperationTypeIndexUseCase
{
  public function __construct(
    private readonly OperationTypeRepositoryInterface $operation_typeRepository
  ){    
  }
  
  public function execute(OperationTypeFilterDto $operation_typeFilterDto): array
  {
    $operation_typeFilter = new OperationTypeFilter(...$operation_typeFilterDto->toArray());
    return $this->operation_typeRepository->index($operation_typeFilter);
  }
}
