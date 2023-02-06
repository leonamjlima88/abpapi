<?php

namespace App\Modules\Financial\Bank\Repository\Memory;

use App\Modules\Financial\Bank\Entity\BankFilter;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class BankRepositoryMemory extends BaseRepositoryMemory implements BankRepositoryInterface
{
  public function index(?BankFilter $bankFilter = null): array
  {
    return (array) $this->list;
  }
}