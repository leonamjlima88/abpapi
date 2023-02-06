<?php

namespace App\Modules\Stock\Unit\Entity;

use App\Shared\Entity\BaseEntity;

class Unit extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public string $description,
    public ?string $created_at = '',
    public ?string $updated_at = '',
    public ?int $created_by_user_id = 0,
    public ?int $updated_by_user_id = 0,
    public ?int $tenant_id = 0,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
