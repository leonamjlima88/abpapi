<?php

namespace App\Modules\Stock\Ncm\Entity;

use App\Shared\Entity\BaseEntity;

class Ncm extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,    
    public string $code,    
    public ?float $national_rate = 0,
    public ?float $imported_rate = 0,
    public ?float $state_rate = 0,
    public ?float $municipal_rate = 0,    
    public ?string $additional_information = '',
    public ?string $start_of_validity = '',
    public ?string $end_of_validity = '',
    public ?string $created_at = '',
    public ?string $updated_at = '',
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
