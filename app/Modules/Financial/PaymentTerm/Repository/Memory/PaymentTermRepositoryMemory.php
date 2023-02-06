<?php

namespace App\Modules\Financial\PaymentTerm\Repository\Memory;

use App\Modules\Financial\PaymentTerm\Entity\PaymentTermFilter;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;
use App\Shared\Repository\Memory\BaseRepositoryMemory;

class PaymentTermRepositoryMemory extends BaseRepositoryMemory implements PaymentTermRepositoryInterface
{
  public function index(?PaymentTermFilter $payment_termFilter = null): array
  {
    return (array) $this->list;
  }
}