<?php

namespace App\Modules\Stock\StorageLocation\Entity;

use App\Shared\Entity\BaseEntity;

class StorageLocation extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
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
