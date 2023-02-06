<?php

namespace App\Modules\Stock\Ncm\UseCase;

use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;

class NcmDestroyUseCase
{
  public function __construct(
    private readonly NcmRepositoryInterface $ncmRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->ncmRepository->destroy($id);
  }
}
