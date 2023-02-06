<?php

namespace App\Modules\Financial\Document\Repository\Memory;

use App\Modules\Financial\Document\Entity\DocumentFilter;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class DocumentRepositoryMemory extends BaseRepositoryMemory implements DocumentRepositoryInterface
{
  public function index(?DocumentFilter $documentFilter = null): array
  {
    return (array) $this->list;
  }
}