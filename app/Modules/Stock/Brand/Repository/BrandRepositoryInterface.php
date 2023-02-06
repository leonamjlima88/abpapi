<?php 

namespace App\Modules\Stock\Brand\Repository;

use App\Modules\Stock\Brand\Entity\BrandFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface BrandRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?BrandFilter $brandFilter = null): array;
}
