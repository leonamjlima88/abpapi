<?php

namespace App\Modules\Stock\Brand\UseCase;

use App\Modules\Stock\Brand\Dto\BrandDto;
use App\Modules\Stock\Brand\Mapper\BrandMapper;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;

class BrandUpdateAndShowUseCase
{
  public function __construct(
    private readonly BrandRepositoryInterface $brandRepository
  ){    
  }
  
  public function execute(int $id, BrandDto $brandDto): BrandDto 
  {
    $brandEntity = BrandMapper::mapDtoToEntity($brandDto);
    $this->brandRepository->update($id, $brandEntity);
    $brandEntityFound = $this->brandRepository->show($id);

    return BrandMapper::mapEntityToDto($brandEntityFound);
  }
}
