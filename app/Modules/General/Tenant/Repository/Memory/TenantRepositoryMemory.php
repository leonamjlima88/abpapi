<?php

namespace App\Modules\General\Tenant\Repository\Memory;

use App\Modules\General\Tenant\Entity\TenantFilter;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class TenantRepositoryMemory extends BaseRepositoryMemory implements TenantRepositoryInterface
{
  public function index(?TenantFilter $tenantFilter = null): array
  {
    return (array) $this->list;
  }
}