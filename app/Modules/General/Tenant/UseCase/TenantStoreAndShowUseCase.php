<?php

namespace App\Modules\General\Tenant\UseCase;

use App\Modules\General\Tenant\Dto\TenantDto;
use App\Modules\General\Tenant\Mapper\TenantMapper;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;

class TenantStoreAndShowUseCase
{
  public function __construct(
    private readonly TenantRepositoryInterface $tenantRepository
  ){    
  }
  
  public function execute(TenantDto $tenantDto): TenantDto 
  {
    $tenantEntity = TenantMapper::mapDtoToEntity($tenantDto);
    $storedId = $this->tenantRepository->store($tenantEntity);
    $tenantEntityFound = $this->tenantRepository->show($storedId);
    
    return TenantMapper::mapEntityToDto($tenantEntityFound);
  }
}
