<?php

namespace App\Modules\Financial\BankAccount\UseCase;

use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;

class BankAccountDestroyUseCase
{
  public function __construct(
    private readonly BankAccountRepositoryInterface $bank_accountRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->bank_accountRepository->destroy($id);
  }
}
