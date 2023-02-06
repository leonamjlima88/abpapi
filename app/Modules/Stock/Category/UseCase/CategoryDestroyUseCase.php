<?php

namespace App\Modules\Stock\Category\UseCase;

use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;

class CategoryDestroyUseCase
{
  public function __construct(
    private readonly CategoryRepositoryInterface $categoryRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->categoryRepository->destroy($id);
  }
}
