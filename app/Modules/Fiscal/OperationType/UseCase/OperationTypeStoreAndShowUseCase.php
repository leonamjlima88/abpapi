<?php

namespace App\Modules\Fiscal\OperationType\UseCase;

use App\Modules\Fiscal\OperationType\Dto\OperationTypeDto;
use App\Modules\Fiscal\OperationType\Mapper\OperationTypeMapper;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;

class OperationTypeStoreAndShowUseCase
{
  public function __construct(
    private readonly OperationTypeRepositoryInterface $operation_typeRepository
  ){    
  }
  
  public function execute(OperationTypeDto $operation_typeDto): OperationTypeDto 
  {
    $operation_typeEntity = OperationTypeMapper::mapDtoToEntity($operation_typeDto);
    $storedId = $this->operation_typeRepository->store($operation_typeEntity);
    $operation_typeEntityFound = $this->operation_typeRepository->show($storedId);
    
    return OperationTypeMapper::mapEntityToDto($operation_typeEntityFound);
  }
}
