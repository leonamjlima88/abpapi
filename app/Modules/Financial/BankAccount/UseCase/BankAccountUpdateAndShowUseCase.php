<?php

namespace App\Modules\Financial\BankAccount\UseCase;

use App\Modules\Financial\BankAccount\Dto\BankAccountDto;
use App\Modules\Financial\BankAccount\Mapper\BankAccountMapper;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;

class BankAccountUpdateAndShowUseCase
{
  public function __construct(
    private readonly BankAccountRepositoryInterface $bank_accountRepository
  ){    
  }
  
  public function execute(int $id, BankAccountDto $bank_accountDto): BankAccountDto 
  {
    $bank_accountEntity = BankAccountMapper::mapDtoToEntity($bank_accountDto);
    $this->bank_accountRepository->update($id, $bank_accountEntity);
    $bank_accountEntityFound = $this->bank_accountRepository->show($id);

    return BankAccountMapper::mapEntityToDto($bank_accountEntityFound);
  }
}
