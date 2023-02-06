<?php

namespace App\Modules\Stock\Brand\Entity;

use App\Shared\Entity\BaseEntity;

class Brand extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public ?string $created_at = null,
    public ?string $updated_at = null,
    public ?int $created_by_user_id = null,
    public ?int $updated_by_user_id = null,
    public ?int $tenant_id = null,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
