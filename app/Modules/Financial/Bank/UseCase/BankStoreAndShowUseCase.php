<?php

namespace App\Modules\Financial\Bank\UseCase;

use App\Modules\Financial\Bank\Dto\BankDto;
use App\Modules\Financial\Bank\Mapper\BankMapper;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;

class BankStoreAndShowUseCase
{
  public function __construct(
    private readonly BankRepositoryInterface $bankRepository
  ){    
  }
  
  public function execute(BankDto $bankDto): BankDto 
  {
    $bankEntity = BankMapper::mapDtoToEntity($bankDto);
    $storedId = $this->bankRepository->store($bankEntity);
    $bankEntityFound = $this->bankRepository->show($storedId);
    
    return BankMapper::mapEntityToDto($bankEntityFound);
  }
}
