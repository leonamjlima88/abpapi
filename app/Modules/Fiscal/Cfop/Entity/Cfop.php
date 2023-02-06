<?php

namespace App\Modules\Fiscal\Cfop\Entity;

use App\Modules\Fiscal\Cfop\Repository\Enum\CfopOperationTypeEnum;
use App\Shared\Entity\BaseEntity;

class Cfop extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public string $code,
    public CfopOperationTypeEnum|int|null $operation_type,
    public ?string $created_at = null,
    public ?string $updated_at = null,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
