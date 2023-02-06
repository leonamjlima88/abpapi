<?php

namespace App\Modules\Financial\Bank\UseCase;

use App\Modules\Financial\Bank\Dto\BankDto;
use App\Modules\Financial\Bank\Mapper\BankMapper;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;

class BankShowUseCase
{
  public function __construct(
    private readonly BankRepositoryInterface $bankRepository
  ){    
  }
  
  public function execute(int $id): ?BankDto
  {
    $bankEntityFound = $this->bankRepository->show($id);
    return $bankEntityFound 
      ? BankMapper::mapEntityToDto($bankEntityFound) 
      : null;
  }
}
