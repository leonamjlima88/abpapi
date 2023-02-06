<?php 

namespace App\Modules\Financial\ChartOfAccount\Repository;

use App\Modules\Financial\ChartOfAccount\Entity\ChartOfAccountFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface ChartOfAccountRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?ChartOfAccountFilter $chart_of_accountFilter = null): array;
}
