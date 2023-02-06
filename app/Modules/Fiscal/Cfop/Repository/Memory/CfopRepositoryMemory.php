<?php

namespace App\Modules\Fiscal\Cfop\Repository\Memory;

use App\Modules\Fiscal\Cfop\Entity\CfopFilter;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class CfopRepositoryMemory extends BaseRepositoryMemory implements CfopRepositoryInterface
{
  public function index(?CfopFilter $cfopFilter = null): array
  {
    return (array) $this->list;
  }
}