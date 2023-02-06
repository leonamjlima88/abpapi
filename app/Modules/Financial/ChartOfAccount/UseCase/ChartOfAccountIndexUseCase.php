<?php

namespace App\Modules\Financial\ChartOfAccount\UseCase;

use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountFilterDto;
use App\Modules\Financial\ChartOfAccount\Entity\ChartOfAccountFilter;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;

class ChartOfAccountIndexUseCase
{
  public function __construct(
    private readonly ChartOfAccountRepositoryInterface $chart_of_accountRepository
  ){    
  }
  
  public function execute(ChartOfAccountFilterDto $chart_of_accountFilterDto): array
  {
    $chart_of_accountFilter = new ChartOfAccountFilter(...$chart_of_accountFilterDto->toArray());
    return $this->chart_of_accountRepository->index($chart_of_accountFilter);
  }
}
