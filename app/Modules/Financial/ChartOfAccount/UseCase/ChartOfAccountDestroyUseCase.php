<?php

namespace App\Modules\Financial\ChartOfAccount\UseCase;

use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;

class ChartOfAccountDestroyUseCase
{
  public function __construct(
    private readonly ChartOfAccountRepositoryInterface $chart_of_accountRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->chart_of_accountRepository->destroy($id);
  }
}
