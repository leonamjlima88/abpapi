<?php

namespace App\Modules\Stock\Product\UseCase;

use App\Modules\Stock\Product\Dto\ProductDto;
use App\Modules\Stock\Product\Mapper\ProductMapper;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;

class ProductUpdateAndShowUseCase
{
  public function __construct(
    private readonly ProductRepositoryInterface $productRepository
  ){    
  }
  
  public function execute(int $id, ProductDto $productDto): ProductDto 
  {
    $productEntity = ProductMapper::mapDtoToEntity($productDto);
    $this->productRepository->update($id, $productEntity);
    $productEntityFound = $this->productRepository->show($id);

    return ProductMapper::mapEntityToDto($productEntityFound);
  }
}
