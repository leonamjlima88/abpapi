<?php

namespace App\Modules\General\Person\Repository\Memory;

use App\Modules\General\Person\Entity\PersonFilter;
use App\Modules\General\Person\Repository\PersonRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class PersonRepositoryMemory extends BaseRepositoryMemory implements PersonRepositoryInterface
{
  public function index(?PersonFilter $personFilter = null): array
  {
    return (array) $this->list;
  }
}