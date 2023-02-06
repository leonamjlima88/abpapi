<?php

namespace App\Modules\Stock\Category\UseCase;

use App\Modules\Stock\Category\Dto\CategoryFilterDto;
use App\Modules\Stock\Category\Entity\CategoryFilter;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;

class CategoryIndexUseCase
{
  public function __construct(
    private readonly CategoryRepositoryInterface $categoryRepository
  ){    
  }
  
  public function execute(CategoryFilterDto $categoryFilterDto): array
  {
    $categoryFilter = new CategoryFilter(...$categoryFilterDto->toArray());
    return $this->categoryRepository->index($categoryFilter);
  }
}
