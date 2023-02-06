<?php

namespace App\Modules\Stock\Ncm\UseCase;

use App\Modules\Stock\Ncm\Dto\NcmDto;
use App\Modules\Stock\Ncm\Mapper\NcmMapper;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;

class NcmUpdateAndShowUseCase
{
  public function __construct(
    private readonly NcmRepositoryInterface $ncmRepository
  ){    
  }
  
  public function execute(int $id, NcmDto $ncmDto): NcmDto 
  {
    $ncmEntity = NcmMapper::mapDtoToEntity($ncmDto);
    $this->ncmRepository->update($id, $ncmEntity);
    $ncmEntityFound = $this->ncmRepository->show($id);

    return NcmMapper::mapEntityToDto($ncmEntityFound);
  }
}
