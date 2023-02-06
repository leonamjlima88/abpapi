<?php

namespace App\Modules\Stock\Unit\UseCase;

use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;

class UnitDestroyUseCase
{
  public function __construct(
    private readonly UnitRepositoryInterface $unitRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->unitRepository->destroy($id);
  }
}
