<?php

namespace App\Modules\Stock\Product\Repository\Memory;

use App\Modules\Stock\Product\Entity\ProductFilter;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class ProductRepositoryMemory extends BaseRepositoryMemory implements ProductRepositoryInterface
{
  public function index(?ProductFilter $productFilter = null): array
  {
    return (array) $this->list;
  }
}