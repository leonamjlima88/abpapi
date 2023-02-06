<?php

namespace App\Modules\General\City\Repository\Memory;

use App\Modules\General\City\Entity\CityFilter;
use App\Modules\General\City\Repository\CityRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class CityRepositoryMemory extends BaseRepositoryMemory implements CityRepositoryInterface
{
  public function index(?CityFilter $cityFilter = null): array
  {
    return (array) $this->list;
  }
}