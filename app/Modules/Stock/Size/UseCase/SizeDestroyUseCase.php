<?php

namespace App\Modules\Stock\Size\UseCase;

use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;

class SizeDestroyUseCase
{
  public function __construct(
    private readonly SizeRepositoryInterface $sizeRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->sizeRepository->destroy($id);
  }
}
