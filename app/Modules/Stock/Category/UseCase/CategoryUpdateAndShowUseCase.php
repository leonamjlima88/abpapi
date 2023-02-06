<?php

namespace App\Modules\Stock\Category\UseCase;

use App\Modules\Stock\Category\Dto\CategoryDto;
use App\Modules\Stock\Category\Mapper\CategoryMapper;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;

class CategoryUpdateAndShowUseCase
{
  public function __construct(
    private readonly CategoryRepositoryInterface $categoryRepository
  ){    
  }
  
  public function execute(int $id, CategoryDto $categoryDto): CategoryDto 
  {
    $categoryEntity = CategoryMapper::mapDtoToEntity($categoryDto);
    $this->categoryRepository->update($id, $categoryEntity);
    $categoryEntityFound = $this->categoryRepository->show($id);

    return CategoryMapper::mapEntityToDto($categoryEntityFound);
  }
}
