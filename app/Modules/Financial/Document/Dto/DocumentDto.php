<?php

namespace App\Modules\Financial\Document\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class DocumentDto extends Data
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

    #[Rule('nullable|boolean')]
    public ?bool $is_release_as_completed,

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
}
