<?php

namespace App\Modules\General\Tenant\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class TenantDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('required|string|max:100')]
    public string $business_name,

    #[Rule('required|string|max:100')]
    public string $alias_name,

    // Validação abaixo em rules()
    public string $cnpj,

    #[Rule('nullable|string|max:20')]
    public ?string $state_registration,

    #[Rule('nullable|string|max:20')]
    public ?string $municipal_registration,

    #[Rule('nullable|string|max:10')]
    public ?string $zip_code,

    #[Rule('required|string|max:100')]
    public string $address,

    #[Rule('nullable|string|max:15')]
    public ?string $address_number,

    #[Rule('nullable|string|max:100')]
    public ?string $complement,

    #[Rule('required|string|max:100')]
    public string $district,

    #[Rule('required|integer')]
    public int $city_id,

    #[Rule('nullable|string|max:100')]
    public ?string $reference_point,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_1,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_2,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_3,

    #[Rule('nullable|string|max:100|email')]
    public ?string $company_email,

    #[Rule('nullable|string|max:100|email')]
    public ?string $financial_email,

    #[Rule('nullable|string|max:255')]
    public ?string $internet_page,

    #[Rule('nullable|string')]
    public ?string $note,

    #[Rule('nullable|string|min:10')]
    public ?string $created_at,

    #[Rule('nullable|string|min:10')]
    public ?string $updated_at,

    #[Rule('nullable')]
    public object|array|null $city,
  ){
  }

  public static function rules(): array
  {
    return [
      'cnpj' => [
        'required',
        'string',
        'numeric',
        fn ($att, $value, $fail) => static::rulesCnpj($att, $value, $fail),
      ],
    ];
  }

  // Validar CPF/CNPJ
  public static function rulesCnpj($att, $value, $fail)
  {
    if ($value && (!cpfOrCnpjIsValid($value))) {
      $fail(trans('request_validation.field_is_not_valid', ['value' => $value]));
    }
  }
}
