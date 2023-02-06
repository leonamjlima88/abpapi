<?php

namespace App\Modules\Stock\Product\UseCase;

use App\Modules\Stock\Product\Dto\ProductFilterDto;
use App\Modules\Stock\Product\Entity\ProductFilter;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;

class ProductIndexUseCase
{
  public function __construct(
    private readonly ProductRepositoryInterface $productRepository
  ){    
  }
  
  public function execute(ProductFilterDto $productFilterDto): array
  {
    $productFilter = new ProductFilter(...$productFilterDto->toArray());
    return $this->productRepository->index($productFilter);
  }
}
