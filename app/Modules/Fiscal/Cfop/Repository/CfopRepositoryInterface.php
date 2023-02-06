<?php 

namespace App\Modules\Fiscal\Cfop\Repository;

use App\Modules\Fiscal\Cfop\Entity\CfopFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface CfopRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?CfopFilter $cfopFilter = null): array;
}
