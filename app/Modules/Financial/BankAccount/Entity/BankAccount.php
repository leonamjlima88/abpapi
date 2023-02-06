<?php

namespace App\Modules\Financial\BankAccount\Entity;

use App\Modules\Financial\Bank\Entity\Bank;
use App\Shared\Entity\BaseEntity;

class BankAccount extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public int $bank_id = 0,
    public ?string $note = '',
    public ?string $created_at = '',
    public ?string $updated_at = '',
    public ?int $created_by_user_id = 0,
    public ?int $updated_by_user_id = 0,
    public ?int $tenant_id = 0,

    // Campo virtual
    public Bank|array|null $bank,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
