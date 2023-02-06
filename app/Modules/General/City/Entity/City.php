<?php

namespace App\Modules\General\City\Entity;

use App\Modules\General\State\Entity\State;
use App\Shared\Entity\BaseEntity;

class City extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public string $ibge_code,
    public int $state_id,
    public ?string $created_at = null,
    public ?string $updated_at = null,
    public State|array|null $state,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
