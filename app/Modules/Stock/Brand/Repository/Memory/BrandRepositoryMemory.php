<?php

namespace App\Modules\Stock\Brand\Repository\Memory;

use App\Modules\Stock\Brand\Entity\BrandFilter;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class BrandRepositoryMemory extends BaseRepositoryMemory implements BrandRepositoryInterface
{
  public function index(?BrandFilter $brandFilter = null): array
  {
    return (array) $this->list;
  }
}