<?php

namespace App\Modules\Stock\Category\UseCase;

use App\Modules\Stock\Category\Dto\CategoryDto;
use App\Modules\Stock\Category\Mapper\CategoryMapper;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;
use Exception;

class CategoryShowUseCase
{
  public function __construct(
    private readonly CategoryRepositoryInterface $categoryRepository
  ){    
  }
  
  public function execute(int $id): ?CategoryDto
  {
    $categoryEntityFound = $this->categoryRepository->show($id);
    return $categoryEntityFound 
      ? CategoryMapper::mapEntityToDto($categoryEntityFound) 
      : null;
  }
}
