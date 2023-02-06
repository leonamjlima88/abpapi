<?php

namespace App\Modules\Stock\Ncm\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class NcmDto extends Data
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

    #[Rule('required|integer|max:99999999')] 
    public string $code,

    #[Rule('nullable|numeric')] 
    public ?float $national_rate,

    #[Rule('nullable|numeric')] 
    public ?float $imported_rate,

    #[Rule('nullable|numeric')] 
    public ?float $state_rate,

    #[Rule('nullable|numeric')] 
    public ?float $municipal_rate,

    #[Rule('nullable|string')] 
    public ?string $additional_information,

    #[Rule('nullable|date_format:Y-m-d')]
    public ?string $start_of_validity,

    #[Rule('nullable|date_format:Y-m-d')]
    public ?string $end_of_validity,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $created_at,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $updated_at,
  ){
  }
}
