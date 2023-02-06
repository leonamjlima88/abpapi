<?php

namespace App\Modules\Stock\Ncm\UseCase;

use App\Modules\Stock\Ncm\Dto\NcmFilterDto;
use App\Modules\Stock\Ncm\Entity\NcmFilter;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;

class NcmIndexUseCase
{
  public function __construct(
    private readonly NcmRepositoryInterface $ncmRepository
  ){    
  }
  
  public function execute(NcmFilterDto $ncmFilterDto): array
  {
    $ncmFilter = new NcmFilter(...$ncmFilterDto->toArray());
    return $this->ncmRepository->index($ncmFilter);
  }
}
