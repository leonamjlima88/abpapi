<?php

namespace App\Modules\General\State\Entity;

use App\Shared\Entity\BaseEntity;

class State extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public string $abbreviation,
    public ?string $created_at = null,
    public ?string $updated_at = null,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
