<?php 

namespace App\Modules\General\State\Repository;

use App\Modules\General\State\Entity\StateFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface StateRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?StateFilter $stateFilter = null): array;
}
