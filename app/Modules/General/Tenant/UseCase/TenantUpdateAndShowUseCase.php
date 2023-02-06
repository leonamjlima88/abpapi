<?php

namespace App\Modules\General\Tenant\UseCase;

use App\Modules\General\Tenant\Dto\TenantDto;
use App\Modules\General\Tenant\Mapper\TenantMapper;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;

class TenantUpdateAndShowUseCase
{
  public function __construct(
    private readonly TenantRepositoryInterface $tenantRepository
  ){    
  }
  
  public function execute(int $id, TenantDto $tenantDto): TenantDto 
  {
    $tenantEntity = TenantMapper::mapDtoToEntity($tenantDto);
    $this->tenantRepository->update($id, $tenantEntity);
    $tenantEntityFound = $this->tenantRepository->show($id);

    return TenantMapper::mapEntityToDto($tenantEntityFound);
  }
}
