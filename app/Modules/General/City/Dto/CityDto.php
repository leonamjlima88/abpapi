<?php

namespace App\Modules\General\City\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class CityDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('required|string|max:100')]
    public string $name,

    #[Rule('required|string|max:20')]
    public string $ibge_code,

    #[Rule('required|integer')]
    public int $state_id,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $created_at,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $updated_at,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $state,
  ){
  }
}
