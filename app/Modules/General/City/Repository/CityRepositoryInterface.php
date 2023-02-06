<?php 

namespace App\Modules\General\City\Repository;

use App\Modules\General\City\Entity\CityFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface CityRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?CityFilter $cityFilter = null): array;
}
