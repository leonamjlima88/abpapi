<?php

namespace App\Modules\Financial\BankAccount\UseCase;

use App\Modules\Financial\BankAccount\Dto\BankAccountDto;
use App\Modules\Financial\BankAccount\Mapper\BankAccountMapper;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;

class BankAccountStoreAndShowUseCase
{
  public function __construct(
    private readonly BankAccountRepositoryInterface $bank_accountRepository
  ){    
  }
  
  public function execute(BankAccountDto $bank_accountDto): BankAccountDto 
  {
    $bank_accountEntity = BankAccountMapper::mapDtoToEntity($bank_accountDto);
    $storedId = $this->bank_accountRepository->store($bank_accountEntity);
    $bank_accountEntityFound = $this->bank_accountRepository->show($storedId);
    
    return BankAccountMapper::mapEntityToDto($bank_accountEntityFound);
  }
}
