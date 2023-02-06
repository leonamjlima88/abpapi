<?php

namespace App\Modules\Fiscal\OperationType\UseCase;

use App\Modules\Fiscal\OperationType\Dto\OperationTypeDto;
use App\Modules\Fiscal\OperationType\Mapper\OperationTypeMapper;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;

class OperationTypeShowUseCase
{
  public function __construct(
    private readonly OperationTypeRepositoryInterface $operation_typeRepository
  ){    
  }
  
  public function execute(int $id): ?OperationTypeDto
  {
    $operation_typeEntityFound = $this->operation_typeRepository->show($id);
    return $operation_typeEntityFound 
      ? OperationTypeMapper::mapEntityToDto($operation_typeEntityFound) 
      : null;
  }
}
