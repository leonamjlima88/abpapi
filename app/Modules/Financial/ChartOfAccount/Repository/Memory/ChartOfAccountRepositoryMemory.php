<?php

namespace App\Modules\Financial\ChartOfAccount\Repository\Memory;

use App\Modules\Financial\ChartOfAccount\Entity\ChartOfAccountFilter;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class ChartOfAccountRepositoryMemory extends BaseRepositoryMemory implements ChartOfAccountRepositoryInterface
{
  public function index(?ChartOfAccountFilter $chart_of_accountFilter = null): array
  {
    return (array) $this->list;
  }
}