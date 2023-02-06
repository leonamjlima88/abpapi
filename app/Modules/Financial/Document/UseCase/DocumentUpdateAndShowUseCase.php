<?php

namespace App\Modules\Financial\Document\UseCase;

use App\Modules\Financial\Document\Dto\DocumentDto;
use App\Modules\Financial\Document\Mapper\DocumentMapper;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;

class DocumentUpdateAndShowUseCase
{
  public function __construct(
    private readonly DocumentRepositoryInterface $documentRepository
  ){    
  }
  
  public function execute(int $id, DocumentDto $documentDto): DocumentDto 
  {
    $documentEntity = DocumentMapper::mapDtoToEntity($documentDto);
    $this->documentRepository->update($id, $documentEntity);
    $documentEntityFound = $this->documentRepository->show($id);

    return DocumentMapper::mapEntityToDto($documentEntityFound);
  }
}
