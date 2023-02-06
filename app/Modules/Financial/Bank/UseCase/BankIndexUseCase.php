<?php

namespace App\Modules\Financial\Bank\UseCase;

use App\Modules\Financial\Bank\Dto\BankFilterDto;
use App\Modules\Financial\Bank\Entity\BankFilter;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;

class BankIndexUseCase
{
  public function __construct(
    private readonly BankRepositoryInterface $bankRepository
  ){    
  }
  
  public function execute(BankFilterDto $bankFilterDto): array
  {
    $bankFilter = new BankFilter(...$bankFilterDto->toArray());
    return $this->bankRepository->index($bankFilter);
  }
}
