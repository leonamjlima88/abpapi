<?php

namespace App\Modules\Stock\Category\Repository\Memory;

use App\Modules\Stock\Category\Entity\CategoryFilter;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class CategoryRepositoryMemory extends BaseRepositoryMemory implements CategoryRepositoryInterface
{
  public function index(?CategoryFilter $categoryFilter = null): array
  {
    return (array) $this->list;
  }
}