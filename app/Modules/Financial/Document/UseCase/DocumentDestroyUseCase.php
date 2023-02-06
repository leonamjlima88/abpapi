<?php

namespace App\Modules\Financial\Document\UseCase;

use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;

class DocumentDestroyUseCase
{
  public function __construct(
    private readonly DocumentRepositoryInterface $documentRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->documentRepository->destroy($id);
  }
}
