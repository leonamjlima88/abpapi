<?php

namespace App\Modules\Stock\Brand\UseCase;

use App\Modules\Stock\Brand\Dto\BrandDto;
use App\Modules\Stock\Brand\Mapper\BrandMapper;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;

class BrandStoreAndShowUseCase
{
  public function __construct(
    private readonly BrandRepositoryInterface $brandRepository
  ){    
  }
  
  public function execute(BrandDto $brandDto): BrandDto 
  {
    $brandEntity = BrandMapper::mapDtoToEntity($brandDto);
    $storedId = $this->brandRepository->store($brandEntity);
    $brandEntityFound = $this->brandRepository->show($storedId);
    
    return BrandMapper::mapEntityToDto($brandEntityFound);
  }
}
