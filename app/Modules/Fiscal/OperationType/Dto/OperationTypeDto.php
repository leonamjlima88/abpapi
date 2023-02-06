<?php

namespace App\Modules\Fiscal\OperationType\Dto;

use App\Modules\Fiscal\OperationType\Repository\Enum\OperationTypeDocumentTypeEnum;
use App\Modules\Fiscal\OperationType\Repository\Enum\OperationTypeIssuePurposeEnum;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class OperationTypeDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('required|string|max:255')]
    public string $name,

    // Validação abaixo em rules()
    public OperationTypeDocumentTypeEnum|int|null $document_type,

    // Validação abaixo em rules()
    public OperationTypeIssuePurposeEnum|int|null $issue_purpose,

    #[Rule('required|string|max:255')]
    public string $operation_nature_description,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $created_at,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $updated_at,

    #[Rule('nullable|integer')]
    public ?int $created_by_user_id,

    #[Rule('nullable|integer')]
    public ?int $updated_by_user_id,

    #[Rule('nullable|integer')]
    public ?int $tenant_id,
  ){
  }

  public static function rules(): array
  {
    return [
      'document_type' => [
        'required',
        new Enum(OperationTypeDocumentTypeEnum::class)
      ],
      'issue_purpose' => [
        'required',
        new Enum(OperationTypeIssuePurposeEnum::class)
      ],
    ];
  }
}
