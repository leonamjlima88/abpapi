<?php

namespace App\Modules\General\Tenant\UseCase;

use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;

class TenantDestroyUseCase
{
  public function __construct(
    private readonly TenantRepositoryInterface $tenantRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->tenantRepository->destroy($id);
  }
}
