<?php

namespace App\Modules\Stock\Product\UseCase;

use App\Modules\Stock\Product\Dto\ProductDto;
use App\Modules\Stock\Product\Mapper\ProductMapper;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;

class ProductStoreAndShowUseCase
{
  public function __construct(
    private readonly ProductRepositoryInterface $productRepository
  ){    
  }
  
  public function execute(ProductDto $productDto): ProductDto 
  {
    $productEntity = ProductMapper::mapDtoToEntity($productDto);
    $storedId = $this->productRepository->store($productEntity);
    $productEntityFound = $this->productRepository->show($storedId);
    
    return ProductMapper::mapEntityToDto($productEntityFound);
  }
}
