<?php

namespace App\Modules\General\Person\Dto;

use App\Modules\General\Person\Repository\Enum\PersonIcmsTaxPayerEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Validator;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class PersonDto extends Data
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

    // Validação abaixo em rules()
    public PersonIcmsTaxPayerEnum|int|null $icms_taxpayer,

    #[Rule('nullable|string|max:20')]
    public ?string $state_registration,

    #[Rule('nullable|string|max:20')]
    public ?string $municipal_registration,

    #[Rule('nullable|integer|max:99999999')]
    public ?string $zip_code,

    #[Rule('required|string|max:255')]
    public string $address,

    #[Rule('nullable|string|max:15')]
    public ?string $address_number,

    #[Rule('nullable|string|max:255')]
    public ?string $complement,

    #[Rule('required|string|max:255')]
    public string $district,

    #[Rule('required|integer')]
    public int $city_id,

    #[Rule('nullable|string|max:255')]
    public ?string $reference_point,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_1,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_2,

    #[Rule('nullable|string|max:40')]
    public ?string $phone_3,

    #[Rule('nullable|string|max:255|email')]
    public ?string $company_email,

    #[Rule('nullable|string|max:255|email')]
    public ?string $financial_email,

    #[Rule('nullable|string|max:255')]
    public ?string $internet_page,

    #[Rule('nullable|string')]
    public ?string $note,

    #[Rule('nullable|string')]
    public ?string $bank_note,

    #[Rule('nullable|string')]
    public ?string $commercial_note,

    #[Rule('nullable|boolean')]
    public ?bool $is_customer,

    #[Rule('nullable|boolean')]
    public ?bool $is_seller,

    #[Rule('nullable|boolean')]
    public ?bool $is_supplier,

    #[Rule('nullable|boolean')]
    public ?bool $is_carrier,

    #[Rule('nullable|boolean')]
    public ?bool $is_technician,

    #[Rule('nullable|boolean')]
    public ?bool $is_employee,

    #[Rule('nullable|boolean')]
    public ?bool $is_other,

    #[Rule('required|boolean')]
    public bool $is_final_customer,

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

    /** @var PersonContactDto[] */
    public ?DataCollection $person_contact,

    /** @var PersonAddressDto[] */
    public ?DataCollection $person_address,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $city,
  ){
  }

  public static function rules(): array
  {
    return [
      'cnpj' => [
        'required',
        'integer',
        fn ($att, $value, $fail) => static::rulesCnpj($att, $value, $fail),
      ],
      'type' => [
        'nullable',
        new Enum(PersonAddressTypeEnum::class)
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

  public static function withValidator(Validator $validator): void
  {
    $validator->after(function ($validator) {
      // Person - Tipo de Pessoa é obrigatório
      if ((!request('is_customer', ''))
      &&  (!request('is_seller', ''))
      &&  (!request('is_supplier', ''))
      &&  (!request('is_carrier', ''))
      &&  (!request('is_technician', ''))
      &&  (!request('is_employee', ''))
      &&  (!request('is_other', ''))
      ) {
        $validator->errors()->add('is_customer|is_seller|is_supplier|...', trans('request_validation.at_least_one_field_must_be_filled'));
      }
    });
  }
}
