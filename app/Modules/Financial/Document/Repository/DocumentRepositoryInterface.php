<?php 

namespace App\Modules\Financial\Document\Repository;

use App\Modules\Financial\Document\Entity\DocumentFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface DocumentRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?DocumentFilter $documentFilter = null): array;
}
