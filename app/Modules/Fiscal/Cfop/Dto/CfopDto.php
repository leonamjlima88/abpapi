<?php

namespace App\Modules\Fiscal\Cfop\Dto;

use App\Modules\Fiscal\Cfop\Repository\Enum\CfopOperationTypeEnum;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class CfopDto extends Data
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

    #[Rule('required|integer|max:9999')]
    public string $code,

    // Validação abaixo em rules()
    public CfopOperationTypeEnum|int|null $operation_type,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $created_at,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $updated_at,
  ){
  }

  public static function rules(): array
  {
    return [
      'operation_type' => [
        'required',
        new Enum(CfopOperationTypeEnum::class)
      ],
    ];
  }
}
