<?php

namespace App\Modules\Fiscal\OperationType\UseCase;

use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;

class OperationTypeDestroyUseCase
{
  public function __construct(
    private readonly OperationTypeRepositoryInterface $operation_typeRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->operation_typeRepository->destroy($id);
  }
}
