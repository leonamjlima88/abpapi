<?php

namespace App\Modules\Stock\Category\Mapper;

use App\Modules\Stock\Category\Dto\CategoryDto;
use App\Modules\Stock\Category\Entity\Category;

class CategoryMapper
{
  public static function mapDtoToEntity(CategoryDto $categoryDto): Category 
  {
    return new Category(...$categoryDto->toArray());
  }  

  public static function mapEntityToDto(Category $categoryEntity): CategoryDto 
  {
    return CategoryDto::from(objectToArray($categoryEntity));
  }  

  public static function mapArrayToEntity(array $data): Category
  {
    return new Category(...$data);
  }  
}