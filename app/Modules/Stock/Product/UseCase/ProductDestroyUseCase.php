<?php

namespace App\Modules\Stock\Product\UseCase;

use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;

class ProductDestroyUseCase
{
  public function __construct(
    private readonly ProductRepositoryInterface $productRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->productRepository->destroy($id);
  }
}
