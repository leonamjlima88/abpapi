<?php 

namespace App\Modules\Financial\Bank\Repository;

use App\Modules\Financial\Bank\Entity\BankFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface BankRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?BankFilter $bankFilter = null): array;
}
