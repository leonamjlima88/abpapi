<?php

namespace App\Modules\Stock\Brand\UseCase;

use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;

class BrandDestroyUseCase
{
  public function __construct(
    private readonly BrandRepositoryInterface $brandRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->brandRepository->destroy($id);
  }
}
