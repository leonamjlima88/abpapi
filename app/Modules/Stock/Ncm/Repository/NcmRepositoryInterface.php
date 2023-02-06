<?php 

namespace App\Modules\Stock\Ncm\Repository;

use App\Modules\Stock\Ncm\Entity\NcmFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface NcmRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?NcmFilter $ncmFilter = null): array;
}
