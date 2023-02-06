<?php

namespace App\Modules\Stock\Product\UseCase;

use App\Modules\Stock\Product\Dto\ProductDto;
use App\Modules\Stock\Product\Mapper\ProductMapper;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;

class ProductShowUseCase
{
  public function __construct(
    private readonly ProductRepositoryInterface $productRepository
  ){    
  }
  
  public function execute(int $id): ?ProductDto
  {
    $productEntityFound = $this->productRepository->show($id);
    return $productEntityFound 
      ? ProductMapper::mapEntityToDto($productEntityFound) 
      : null;
  }
}
