<?php

namespace App\Modules\Financial\Bank\UseCase;

use App\Modules\Financial\Bank\Dto\BankDto;
use App\Modules\Financial\Bank\Mapper\BankMapper;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;

class BankUpdateAndShowUseCase
{
  public function __construct(
    private readonly BankRepositoryInterface $bankRepository
  ){    
  }
  
  public function execute(int $id, BankDto $bankDto): BankDto 
  {
    $bankEntity = BankMapper::mapDtoToEntity($bankDto);
    $this->bankRepository->update($id, $bankEntity);
    $bankEntityFound = $this->bankRepository->show($id);

    return BankMapper::mapEntityToDto($bankEntityFound);
  }
}
