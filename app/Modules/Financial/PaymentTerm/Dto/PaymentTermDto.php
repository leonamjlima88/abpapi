<?php

namespace App\Modules\Financial\PaymentTerm\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class PaymentTermDto extends Data
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

    #[Rule('required|integer')]
    public int $number_of_installments,

    #[Rule('nullable|integer')]
    public ?int $first_installment_in,

    #[Rule('nullable|integer')]
    public ?int $interval_between_installments,

    #[Rule('required|integer')]
    public int $bank_account_id,

    #[Rule('required|integer')]
    public int $document_id,

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

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $bank_account,

    #[Rule('nullable')]
    public object|array|null $document,
  ){
  }
}
