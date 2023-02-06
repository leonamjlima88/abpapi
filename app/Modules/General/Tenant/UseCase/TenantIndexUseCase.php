<?php

namespace App\Modules\General\Tenant\UseCase;

use App\Modules\General\Tenant\Dto\TenantFilterDto;
use App\Modules\General\Tenant\Entity\TenantFilter;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;

class TenantIndexUseCase
{
  public function __construct(
    private readonly TenantRepositoryInterface $tenantRepository
  ){    
  }
  
  public function execute(TenantFilterDto $tenantFilterDto): array
  {
    $tenantFilter = new TenantFilter(...$tenantFilterDto->toArray());
    return $this->tenantRepository->index($tenantFilter);
  }
}
