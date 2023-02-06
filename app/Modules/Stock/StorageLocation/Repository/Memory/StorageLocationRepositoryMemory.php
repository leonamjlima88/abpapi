<?php

namespace App\Modules\Stock\StorageLocation\Repository\Memory;

use App\Modules\Stock\StorageLocation\Entity\StorageLocationFilter;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class StorageLocationRepositoryMemory extends BaseRepositoryMemory implements StorageLocationRepositoryInterface
{
  public function index(?StorageLocationFilter $storage_locationFilter = null): array
  {
    return (array) $this->list;
  }
}