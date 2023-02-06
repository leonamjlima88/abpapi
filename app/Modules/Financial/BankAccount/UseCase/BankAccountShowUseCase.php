<?php

namespace App\Modules\Financial\BankAccount\UseCase;

use App\Modules\Financial\BankAccount\Dto\BankAccountDto;
use App\Modules\Financial\BankAccount\Mapper\BankAccountMapper;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;

class BankAccountShowUseCase
{
  public function __construct(
    private readonly BankAccountRepositoryInterface $bank_accountRepository
  ){    
  }
  
  public function execute(int $id): ?BankAccountDto
  {
    $bank_accountEntityFound = $this->bank_accountRepository->show($id);
    return $bank_accountEntityFound 
      ? BankAccountMapper::mapEntityToDto($bank_accountEntityFound) 
      : null;
  }
}
