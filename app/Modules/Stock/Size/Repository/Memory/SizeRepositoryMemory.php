<?php

namespace App\Modules\Stock\Size\Repository\Memory;

use App\Modules\Stock\Size\Entity\SizeFilter;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class SizeRepositoryMemory extends BaseRepositoryMemory implements SizeRepositoryInterface
{
  public function index(?SizeFilter $sizeFilter = null): array
  {
    return (array) $this->list;
  }
}