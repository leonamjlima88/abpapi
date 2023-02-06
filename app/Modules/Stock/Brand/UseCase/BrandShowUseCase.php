<?php

namespace App\Modules\Stock\Brand\UseCase;

use App\Modules\Stock\Brand\Dto\BrandDto;
use App\Modules\Stock\Brand\Mapper\BrandMapper;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;

class BrandShowUseCase
{
  public function __construct(
    private readonly BrandRepositoryInterface $brandRepository
  ){    
  }
  
  public function execute(int $id): ?BrandDto
  {
    $brandEntityFound = $this->brandRepository->show($id);
    return $brandEntityFound 
      ? BrandMapper::mapEntityToDto($brandEntityFound) 
      : null;
  }
}
