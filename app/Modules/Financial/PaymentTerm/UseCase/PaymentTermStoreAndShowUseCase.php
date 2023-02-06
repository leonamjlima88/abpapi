<?php

namespace App\Modules\Financial\PaymentTerm\UseCase;

use App\Modules\Financial\PaymentTerm\Dto\PaymentTermDto;
use App\Modules\Financial\PaymentTerm\Mapper\PaymentTermMapper;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;

class PaymentTermStoreAndShowUseCase
{
  public function __construct(
    private readonly PaymentTermRepositoryInterface $payment_termRepository
  ){    
  }
  
  public function execute(PaymentTermDto $payment_termDto): PaymentTermDto 
  {
    $payment_termEntity = PaymentTermMapper::mapDtoToEntity($payment_termDto);
    $storedId = $this->payment_termRepository->store($payment_termEntity);
    $payment_termEntityFound = $this->payment_termRepository->show($storedId);
    
    return PaymentTermMapper::mapEntityToDto($payment_termEntityFound);
  }
}
