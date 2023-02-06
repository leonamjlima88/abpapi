<?php

namespace App\Modules\Financial\Document\UseCase;

use App\Modules\Financial\Document\Dto\DocumentFilterDto;
use App\Modules\Financial\Document\Entity\DocumentFilter;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;

class DocumentIndexUseCase
{
  public function __construct(
    private readonly DocumentRepositoryInterface $documentRepository
  ){    
  }
  
  public function execute(DocumentFilterDto $documentFilterDto): array
  {
    $documentFilter = new DocumentFilter(...$documentFilterDto->toArray());
    return $this->documentRepository->index($documentFilter);
  }
}
