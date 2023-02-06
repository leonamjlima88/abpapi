<?php

namespace App\Modules\General\Person\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class PersonContactDto extends Data
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

    #[Rule('required|string|max:255')]
    public string $name,

    public ?string $cnpj,

    #[Rule('nullable|string|max:80')]
    public ?string $type,

    #[Rule('nullable|string')]
    public ?string $note,

    #[Rule('nullable|string|max:40')]
    public ?string $phone,

    #[Rule('nullable|string|email|max:255')]
    public ?string $email,
  ) {
  }

  public static function rules(): array
  {
    return [
      'cnpj' => [
        'nullable',
        'integer',
        fn ($att, $value, $fail) => static::rulesCnpj($att, $value, $fail),
      ],
    ];
  }

  // Validar CPF/CNPJ
  public static function rulesCnpj($att, $value, $fail){
    if ($value && (!cpfOrCnpjIsValid($value))) {
      $fail(trans('request_validation.field_is_not_valid', ['value' => $value]));
    }  
  }
}
