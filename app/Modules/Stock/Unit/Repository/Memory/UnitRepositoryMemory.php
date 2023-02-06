<?php

namespace App\Modules\Stock\Unit\Repository\Memory;

use App\Modules\Stock\Unit\Entity\UnitFilter;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class UnitRepositoryMemory extends BaseRepositoryMemory implements UnitRepositoryInterface
{
  public function index(?UnitFilter $unitFilter = null): array
  {
    return (array) $this->list;
  }
}