<?php

namespace App\Modules\Financial\ChartOfAccount\UseCase;

use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountDto;
use App\Modules\Financial\ChartOfAccount\Mapper\ChartOfAccountMapper;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;

class ChartOfAccountStoreAndShowUseCase
{
  public function __construct(
    private readonly ChartOfAccountRepositoryInterface $chart_of_accountRepository
  ){    
  }
  
  public function execute(ChartOfAccountDto $chart_of_accountDto): ChartOfAccountDto 
  {
    $chart_of_accountEntity = ChartOfAccountMapper::mapDtoToEntity($chart_of_accountDto);
    $storedId = $this->chart_of_accountRepository->store($chart_of_accountEntity);
    $chart_of_accountEntityFound = $this->chart_of_accountRepository->show($storedId);
    
    return ChartOfAccountMapper::mapEntityToDto($chart_of_accountEntityFound);
  }
}
