<?php

namespace App\Modules\Financial\Bank\Entity;

use App\Shared\Entity\BaseEntity;

class Bank extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $code,
    public string $name,
    public ?string $created_at = null,
    public ?string $updated_at = null,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
