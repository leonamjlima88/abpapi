<?php 

namespace App\Modules\Stock\Category\Repository;

use App\Modules\Stock\Category\Entity\CategoryFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?CategoryFilter $categoryFilter = null): array;
}
