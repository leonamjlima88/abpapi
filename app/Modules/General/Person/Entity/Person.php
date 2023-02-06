<?php

namespace App\Modules\General\Person\Entity;

use App\Modules\General\City\Entity\City;
use App\Modules\General\Person\Repository\Enum\PersonIcmsTaxPayerEnum;
use App\Shared\Entity\BaseEntity;

class Person extends BaseEntity
{
  public function __construct(
    public ?int $id = 0, 
    public string $business_name,
    public string $alias_name,
    public string $cnpj,
    public PersonIcmsTaxPayerEnum|int|null $icms_taxpayer,
    public ?string $state_registration = '',
    public ?string $municipal_registration = '',
    public ?string $zip_code = '',
    public string $address,
    public ?string $address_number = '',
    public ?string $complement = '',
    public string $district,
    public int $city_id,
    public ?string $reference_point = '',
    public ?string $phone_1 = '',
    public ?string $phone_2 = '',
    public ?string $phone_3 = '',
    public ?string $company_email = '',
    public ?string $financial_email = '',
    public ?string $internet_page = '',
    public ?string $note = '',
    public ?string $bank_note = '',
    public ?string $commercial_note = '',
    public ?bool $is_customer = false,
    public ?bool $is_seller = false,
    public ?bool $is_supplier = false,
    public ?bool $is_carrier = false,
    public ?bool $is_technician = false,
    public ?bool $is_employee = false,
    public ?bool $is_other = false,
    public bool $is_final_customer,
    public ?string $created_at = '',
    public ?string $updated_at = '',
    public ?int $created_by_user_id = null,
    public ?int $updated_by_user_id = null,
    public ?int $tenant_id = null,

    /** @var PersonContactEntity[] */
    public ?array $person_contact,

    /** @var PersonAddress[] */
    public ?array $person_address,

    // Campo virtual
    public City|array|null $city,    
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
