<?php 

namespace App\Modules\Stock\Unit\Repository;

use App\Modules\Stock\Unit\Entity\UnitFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface UnitRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?UnitFilter $unitFilter = null): array;
}
