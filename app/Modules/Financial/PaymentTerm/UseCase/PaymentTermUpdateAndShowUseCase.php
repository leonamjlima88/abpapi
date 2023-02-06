<?php

namespace App\Modules\Financial\PaymentTerm\UseCase;

use App\Modules\Financial\PaymentTerm\Dto\PaymentTermDto;
use App\Modules\Financial\PaymentTerm\Mapper\PaymentTermMapper;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;

class PaymentTermUpdateAndShowUseCase
{
  public function __construct(
    private readonly PaymentTermRepositoryInterface $payment_termRepository
  ){    
  }
  
  public function execute(int $id, PaymentTermDto $payment_termDto): PaymentTermDto 
  {
    $payment_termEntity = PaymentTermMapper::mapDtoToEntity($payment_termDto);
    $this->payment_termRepository->update($id, $payment_termEntity);
    $payment_termEntityFound = $this->payment_termRepository->show($id);

    return PaymentTermMapper::mapEntityToDto($payment_termEntityFound);
  }
}
