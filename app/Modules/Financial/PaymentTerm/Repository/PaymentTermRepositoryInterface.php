<?php 

namespace App\Modules\Financial\PaymentTerm\Repository;

use App\Modules\Financial\PaymentTerm\Entity\PaymentTermFilter;
use App\Shared\Repository\BaseRepositoryInterface;

interface PaymentTermRepositoryInterface extends BaseRepositoryInterface
{  
  public function index(?PaymentTermFilter $payment_termFilter = null): array;
}
