<?php

namespace App\Modules\Fiscal\OperationType\Entity;

use App\Modules\Fiscal\OperationType\Repository\Enum\OperationTypeDocumentTypeEnum;
use App\Modules\Fiscal\OperationType\Repository\Enum\OperationTypeIssuePurposeEnum;
use App\Shared\Entity\BaseEntity;

class OperationType extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public OperationTypeDocumentTypeEnum|int|null $document_type,
    public OperationTypeIssuePurposeEnum|int|null $issue_purpose,
    public string $operation_nature_description,
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
