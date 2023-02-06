<?php 

namespace App\Modules\Stock\Product\Repository;

use App\Modules\Stock\Product\Entity\ProductFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?ProductFilter $productFilter = null): array;
}
