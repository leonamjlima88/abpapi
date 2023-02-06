<?php

namespace App\Modules\General\Tenant\UseCase;

use App\Modules\General\Tenant\Dto\TenantDto;
use App\Modules\General\Tenant\Mapper\TenantMapper;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;

class TenantShowUseCase
{
  public function __construct(
    private readonly TenantRepositoryInterface $tenantRepository
  ){    
  }
  
  public function execute(int $id): ?TenantDto
  {
    $tenantEntityFound = $this->tenantRepository->show($id);
    return $tenantEntityFound 
      ? TenantMapper::mapEntityToDto($tenantEntityFound) 
      : null;
  }
}
