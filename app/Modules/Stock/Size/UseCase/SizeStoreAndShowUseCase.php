<?php

namespace App\Modules\Stock\Size\UseCase;

use App\Modules\Stock\Size\Dto\SizeDto;
use App\Modules\Stock\Size\Mapper\SizeMapper;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;

class SizeStoreAndShowUseCase
{
  public function __construct(
    private readonly SizeRepositoryInterface $sizeRepository
  ){    
  }
  
  public function execute(SizeDto $sizeDto): SizeDto 
  {
    $sizeEntity = SizeMapper::mapDtoToEntity($sizeDto);
    $storedId = $this->sizeRepository->store($sizeEntity);
    $sizeEntityFound = $this->sizeRepository->show($storedId);
    
    return SizeMapper::mapEntityToDto($sizeEntityFound);
  }
}
