<?php

namespace App\Modules\Financial\Document\UseCase;

use App\Modules\Financial\Document\Dto\DocumentDto;
use App\Modules\Financial\Document\Mapper\DocumentMapper;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;

class DocumentStoreAndShowUseCase
{
  public function __construct(
    private readonly DocumentRepositoryInterface $documentRepository
  ){    
  }
  
  public function execute(DocumentDto $documentDto): DocumentDto 
  {
    $documentEntity = DocumentMapper::mapDtoToEntity($documentDto);
    $storedId = $this->documentRepository->store($documentEntity);
    $documentEntityFound = $this->documentRepository->show($storedId);
    
    return DocumentMapper::mapEntityToDto($documentEntityFound);
  }
}
