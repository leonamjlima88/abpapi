<?php

namespace App\Modules\Financial\ChartOfAccount\UseCase;

use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountDto;
use App\Modules\Financial\ChartOfAccount\Mapper\ChartOfAccountMapper;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;

class ChartOfAccountShowUseCase
{
  public function __construct(
    private readonly ChartOfAccountRepositoryInterface $chart_of_accountRepository
  ){    
  }
  
  public function execute(int $id): ?ChartOfAccountDto
  {
    $chart_of_accountEntityFound = $this->chart_of_accountRepository->show($id);
    return $chart_of_accountEntityFound 
      ? ChartOfAccountMapper::mapEntityToDto($chart_of_accountEntityFound) 
      : null;
  }
}
