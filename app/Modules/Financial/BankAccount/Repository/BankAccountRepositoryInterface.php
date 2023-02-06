<?php 

namespace App\Modules\Financial\BankAccount\Repository;

use App\Modules\Financial\BankAccount\Entity\BankAccountFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface BankAccountRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?BankAccountFilter $bank_accountFilter = null): array;
}
