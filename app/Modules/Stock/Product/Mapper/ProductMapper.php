<?php

namespace App\Modules\Stock\Product\Mapper;

use App\Modules\Stock\Product\Dto\ProductDto;
use App\Modules\Stock\Product\Entity\Product;

class ProductMapper
{
  public static function mapDtoToEntity(ProductDto $productDto): Product 
  {
    return new Product(...$productDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Product
  {
    return new Product(...$data);
  }  

  public static function mapEntityToDto(Product $productEntity): ProductDto 
  {
    return ProductDto::from(objectToArray($productEntity));
  }  
}