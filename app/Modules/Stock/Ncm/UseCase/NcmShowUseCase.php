<?php

namespace App\Modules\Stock\Ncm\UseCase;

use App\Modules\Stock\Ncm\Dto\NcmDto;
use App\Modules\Stock\Ncm\Mapper\NcmMapper;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;

class NcmShowUseCase
{
  public function __construct(
    private readonly NcmRepositoryInterface $ncmRepository
  ){    
  }
  
  public function execute(int $id): ?NcmDto
  {
    $ncmEntityFound = $this->ncmRepository->show($id);
    return $ncmEntityFound 
      ? NcmMapper::mapEntityToDto($ncmEntityFound) 
      : null;
  }
}
