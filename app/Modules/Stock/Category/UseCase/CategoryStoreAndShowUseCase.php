<?php

namespace App\Modules\Stock\Category\UseCase;

use App\Modules\Stock\Category\Dto\CategoryDto;
use App\Modules\Stock\Category\Mapper\CategoryMapper;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;

class CategoryStoreAndShowUseCase
{
  public function __construct(
    private readonly CategoryRepositoryInterface $categoryRepository
  ){    
  }
  
  public function execute(CategoryDto $categoryDto): CategoryDto 
  {
    $categoryEntity = CategoryMapper::mapDtoToEntity($categoryDto);
    $storedId = $this->categoryRepository->store($categoryEntity);
    $categoryEntityFound = $this->categoryRepository->show($storedId);
    
    return CategoryMapper::mapEntityToDto($categoryEntityFound);
  }
}
