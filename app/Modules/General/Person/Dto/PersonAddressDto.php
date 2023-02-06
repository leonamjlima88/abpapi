<?php

namespace App\Modules\General\Person\Dto;

use App\Modules\General\Person\Repository\Enum\PersonAddressTypeEnum;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class PersonAddressDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('nullable|integer')]
    public ?int $person_id,

    // Validação abaixo em rules()
    public PersonAddressTypeEnum|int|null $type,

    #[Rule('nullable|integer|max:99999999')]
    public ?string $zip_code,

    #[Rule('required|string|max:255')]
    public string $address,

    #[Rule('nullable|string|max:15')]
    public ?string $address_number,

    #[Rule('nullable|string|max:255')]
    public ?string $complement,

    #[Rule('required|string|max:255')]
    public ?string $district,

    #[Rule('nullable|string|max:255')]
    public ?string $reference_point,

    #[Rule('required|integer')]
    public int $city_id,

    #[Rule('nullable')]
    public object|array|null $city,
  ) {
  }

  public static function rules(): array
  {
    return [
      'type' => [
        'nullable',
        new Enum(PersonAddressTypeEnum::class)
      ],
    ];
  }
}
