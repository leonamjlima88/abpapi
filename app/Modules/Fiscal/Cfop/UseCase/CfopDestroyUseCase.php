<?php

namespace App\Modules\Fiscal\Cfop\UseCase;

use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;

class CfopDestroyUseCase
{
  public function __construct(
    private readonly CfopRepositoryInterface $cfopRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->cfopRepository->destroy($id);
  }
}
