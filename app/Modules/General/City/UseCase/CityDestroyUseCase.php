<?php

namespace App\Modules\General\City\UseCase;

use App\Modules\General\City\Repository\CityRepositoryInterface;

class CityDestroyUseCase
{
  public function __construct(
    private readonly CityRepositoryInterface $cityRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->cityRepository->destroy($id);
  }
}
