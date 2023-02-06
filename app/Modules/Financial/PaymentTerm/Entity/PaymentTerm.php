<?php

namespace App\Modules\Financial\PaymentTerm\Entity;

use App\Modules\Financial\BankAccount\Entity\BankAccount;
use App\Modules\Financial\Document\Entity\Document;
use App\Shared\Entity\BaseEntity;

class PaymentTerm extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public int $number_of_installments,
    public ?int $first_installment_in = 0,
    public ?int $interval_between_installments = 0,
    public int $bank_account_id,
    public int $document_id,
    public ?string $created_at = '',
    public ?string $updated_at = '',
    public ?int $created_by_user_id = 0,
    public ?int $updated_by_user_id = 0,
    public ?int $tenant_id = 0,

    // Campo virtual
    public BankAccount|array|null $bank_account,
    public Document|array|null $document,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
