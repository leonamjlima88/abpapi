<?php

namespace App\Modules\Financial\PaymentTerm\UseCase;

use App\Modules\Financial\PaymentTerm\Dto\PaymentTermFilterDto;
use App\Modules\Financial\PaymentTerm\Entity\PaymentTermFilter;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;

class PaymentTermIndexUseCase
{
  public function __construct(
    private readonly PaymentTermRepositoryInterface $payment_termRepository
  ){    
  }
  
  public function execute(PaymentTermFilterDto $payment_termFilterDto): array
  {
    $payment_termFilter = new PaymentTermFilter(...$payment_termFilterDto->toArray());
    return $this->payment_termRepository->index($payment_termFilter);
  }
}
