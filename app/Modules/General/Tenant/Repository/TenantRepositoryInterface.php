<?php 

namespace App\Modules\General\Tenant\Repository;

use App\Modules\General\Tenant\Entity\TenantFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface TenantRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?TenantFilter $tenantFilter = null): array;
}
