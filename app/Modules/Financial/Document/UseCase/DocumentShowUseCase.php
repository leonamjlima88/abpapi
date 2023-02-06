<?php

namespace App\Modules\Financial\Document\UseCase;

use App\Modules\Financial\Document\Dto\DocumentDto;
use App\Modules\Financial\Document\Mapper\DocumentMapper;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;

class DocumentShowUseCase
{
  public function __construct(
    private readonly DocumentRepositoryInterface $documentRepository
  ){    
  }
  
  public function execute(int $id): ?DocumentDto
  {
    $documentEntityFound = $this->documentRepository->show($id);
    return $documentEntityFound 
      ? DocumentMapper::mapEntityToDto($documentEntityFound) 
      : null;
  }
}
