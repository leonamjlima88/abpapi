<?php 

namespace App\Modules\Stock\StorageLocation\Repository;

use App\Modules\Stock\StorageLocation\Entity\StorageLocationFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface StorageLocationRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?StorageLocationFilter $storage_locationFilter = null): array;
}
