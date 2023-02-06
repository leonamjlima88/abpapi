<?php

namespace App\Modules\Financial\BankAccount\UseCase;

use App\Modules\Financial\BankAccount\Dto\BankAccountFilterDto;
use App\Modules\Financial\BankAccount\Entity\BankAccountFilter;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;

class BankAccountIndexUseCase
{
  public function __construct(
    private readonly BankAccountRepositoryInterface $bank_accountRepository
  ){    
  }
  
  public function execute(BankAccountFilterDto $bank_accountFilterDto): array
  {
    $bank_accountFilter = new BankAccountFilter(...$bank_accountFilterDto->toArray());
    return $this->bank_accountRepository->index($bank_accountFilter);
  }
}
