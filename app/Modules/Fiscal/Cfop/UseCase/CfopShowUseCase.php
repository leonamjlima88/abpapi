<?php

namespace App\Modules\Fiscal\Cfop\UseCase;

use App\Modules\Fiscal\Cfop\Dto\CfopDto;
use App\Modules\Fiscal\Cfop\Mapper\CfopMapper;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;

class CfopShowUseCase
{
  public function __construct(
    private readonly CfopRepositoryInterface $cfopRepository
  ){    
  }
  
  public function execute(int $id): ?CfopDto
  {
    $cfopEntityFound = $this->cfopRepository->show($id);
    return $cfopEntityFound 
      ? CfopMapper::mapEntityToDto($cfopEntityFound) 
      : null;
  }
}
