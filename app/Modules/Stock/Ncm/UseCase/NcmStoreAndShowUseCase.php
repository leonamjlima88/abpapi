<?php

namespace App\Modules\Stock\Ncm\UseCase;

use App\Modules\Stock\Ncm\Dto\NcmDto;
use App\Modules\Stock\Ncm\Mapper\NcmMapper;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;

class NcmStoreAndShowUseCase
{
  public function __construct(
    private readonly NcmRepositoryInterface $ncmRepository
  ){    
  }
  
  public function execute(NcmDto $ncmDto): NcmDto 
  {
    $ncmEntity = NcmMapper::mapDtoToEntity($ncmDto);
    $storedId = $this->ncmRepository->store($ncmEntity);
    $ncmEntityFound = $this->ncmRepository->show($storedId);
    
    return NcmMapper::mapEntityToDto($ncmEntityFound);
  }
}
