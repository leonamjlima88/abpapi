<?php

namespace App\Modules\Fiscal\Cfop\UseCase;

use App\Modules\Fiscal\Cfop\Dto\CfopDto;
use App\Modules\Fiscal\Cfop\Mapper\CfopMapper;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;

class CfopUpdateAndShowUseCase
{
  public function __construct(
    private readonly CfopRepositoryInterface $cfopRepository
  ){    
  }
  
  public function execute(int $id, CfopDto $cfopDto): CfopDto 
  {
    $cfopEntity = CfopMapper::mapDtoToEntity($cfopDto);
    $this->cfopRepository->update($id, $cfopEntity);
    $cfopEntityFound = $this->cfopRepository->show($id);

    return CfopMapper::mapEntityToDto($cfopEntityFound);
  }
}
