<?php

namespace App\Modules\Fiscal\OperationType\UseCase;

use App\Modules\Fiscal\OperationType\Dto\OperationTypeDto;
use App\Modules\Fiscal\OperationType\Mapper\OperationTypeMapper;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;

class OperationTypeUpdateAndShowUseCase
{
  public function __construct(
    private readonly OperationTypeRepositoryInterface $operation_typeRepository
  ){    
  }
  
  public function execute(int $id, OperationTypeDto $operation_typeDto): OperationTypeDto 
  {
    $operation_typeEntity = OperationTypeMapper::mapDtoToEntity($operation_typeDto);
    $this->operation_typeRepository->update($id, $operation_typeEntity);
    $operation_typeEntityFound = $this->operation_typeRepository->show($id);

    return OperationTypeMapper::mapEntityToDto($operation_typeEntityFound);
  }
}
