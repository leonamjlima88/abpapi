<?php

namespace App\Modules\Stock\Size\UseCase;

use App\Modules\Stock\Size\Dto\SizeDto;
use App\Modules\Stock\Size\Mapper\SizeMapper;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;

class SizeShowUseCase
{
  public function __construct(
    private readonly SizeRepositoryInterface $sizeRepository
  ){    
  }
  
  public function execute(int $id): ?SizeDto
  {
    $sizeEntityFound = $this->sizeRepository->show($id);
    return $sizeEntityFound 
      ? SizeMapper::mapEntityToDto($sizeEntityFound) 
      : null;
  }
}
