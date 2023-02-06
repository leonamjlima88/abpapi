<?php 

namespace App\Modules\Stock\Size\Repository;

use App\Modules\Stock\Size\Entity\SizeFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface SizeRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?SizeFilter $sizeFilter = null): array;
}
