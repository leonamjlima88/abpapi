<?php

namespace App\Modules\Fiscal\Cfop\UseCase;

use App\Modules\Fiscal\Cfop\Dto\CfopFilterDto;
use App\Modules\Fiscal\Cfop\Entity\CfopFilter;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;

class CfopIndexUseCase
{
  public function __construct(
    private readonly CfopRepositoryInterface $cfopRepository
  ){    
  }
  
  public function execute(CfopFilterDto $cfopFilterDto): array
  {
    $cfopFilter = new CfopFilter(...$cfopFilterDto->toArray());
    return $this->cfopRepository->index($cfopFilter);
  }
}
