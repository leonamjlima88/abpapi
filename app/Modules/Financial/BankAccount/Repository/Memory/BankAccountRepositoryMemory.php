<?php

namespace App\Modules\Financial\BankAccount\Repository\Memory;

use App\Modules\Financial\BankAccount\Entity\BankAccountFilter;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class BankAccountRepositoryMemory extends BaseRepositoryMemory implements BankAccountRepositoryInterface
{
  public function index(?BankAccountFilter $bank_accountFilter = null): array
  {
    return (array) $this->list;
  }
}