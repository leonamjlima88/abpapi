<?php

namespace App\Modules\Stock\Size\UseCase;

use App\Modules\Stock\Size\Dto\SizeDto;
use App\Modules\Stock\Size\Mapper\SizeMapper;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;

class SizeUpdateAndShowUseCase
{
  public function __construct(
    private readonly SizeRepositoryInterface $sizeRepository
  ){    
  }
  
  public function execute(int $id, SizeDto $sizeDto): SizeDto 
  {
    $sizeEntity = SizeMapper::mapDtoToEntity($sizeDto);
    $this->sizeRepository->update($id, $sizeEntity);
    $sizeEntityFound = $this->sizeRepository->show($id);

    return SizeMapper::mapEntityToDto($sizeEntityFound);
  }
}
