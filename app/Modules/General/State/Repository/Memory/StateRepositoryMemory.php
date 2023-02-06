<?php

namespace App\Modules\General\State\Repository\Memory;

use App\Modules\General\State\Entity\StateFilter;
use App\Modules\General\State\Repository\StateRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class StateRepositoryMemory extends BaseRepositoryMemory implements StateRepositoryInterface
{
  public function index(?StateFilter $stateFilter = null): array
  {
    return (array) $this->list;
  }
}