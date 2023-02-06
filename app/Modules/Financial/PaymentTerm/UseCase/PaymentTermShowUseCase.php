<?php

namespace App\Modules\Financial\PaymentTerm\UseCase;

use App\Modules\Financial\PaymentTerm\Dto\PaymentTermDto;
use App\Modules\Financial\PaymentTerm\Mapper\PaymentTermMapper;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;

class PaymentTermShowUseCase
{
  public function __construct(
    private readonly PaymentTermRepositoryInterface $payment_termRepository
  ){    
  }
  
  public function execute(int $id): ?PaymentTermDto
  {
    $payment_termEntityFound = $this->payment_termRepository->show($id);
    return $payment_termEntityFound 
      ? PaymentTermMapper::mapEntityToDto($payment_termEntityFound) 
      : null;
  }
}
