<?php

namespace App\Modules\Financial\Bank\UseCase;

use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;

class BankDestroyUseCase
{
  public function __construct(
    private readonly BankRepositoryInterface $bankRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->bankRepository->destroy($id);
  }
}
