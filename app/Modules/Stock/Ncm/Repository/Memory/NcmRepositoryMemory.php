<?php

namespace App\Modules\Stock\Ncm\Repository\Memory;

use App\Modules\Stock\Ncm\Entity\NcmFilter;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class NcmRepositoryMemory extends BaseRepositoryMemory implements NcmRepositoryInterface
{
  public function index(?NcmFilter $ncmFilter = null): array
  {
    return (array) $this->list;
  }
}