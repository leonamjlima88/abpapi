<?php

namespace App\Modules\Fiscal\Cfop\UseCase;

use App\Modules\Fiscal\Cfop\Dto\CfopDto;
use App\Modules\Fiscal\Cfop\Mapper\CfopMapper;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;

class CfopStoreAndShowUseCase
{
  public function __construct(
    private readonly CfopRepositoryInterface $cfopRepository
  ){    
  }
  
  public function execute(CfopDto $cfopDto): CfopDto 
  {
    $cfopEntity = CfopMapper::mapDtoToEntity($cfopDto);
    $storedId = $this->cfopRepository->store($cfopEntity);
    $cfopEntityFound = $this->cfopRepository->show($storedId);
    
    return CfopMapper::mapEntityToDto($cfopEntityFound);
  }
}
