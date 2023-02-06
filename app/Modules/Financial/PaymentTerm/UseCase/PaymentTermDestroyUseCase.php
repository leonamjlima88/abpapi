<?php

namespace App\Modules\Financial\PaymentTerm\UseCase;

use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;

class PaymentTermDestroyUseCase
{
  public function __construct(
    private readonly PaymentTermRepositoryInterface $payment_termRepository
  ){    
  }
  
  public function execute(int $id): bool
  {
    return $this->payment_termRepository->destroy($id);
  }
}
