<?php

namespace App\Modules\General\Tenant\Entity;

use App\Modules\General\City\Entity\City;
use App\Shared\Entity\BaseEntity;

class Tenant extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string  $business_name,
    public string  $alias_name,
    public string  $cnpj,
    public ?string $state_registration = '',
    public ?string $municipal_registration = '',
    public ?string $zip_code = '',
    public string  $address,
    public ?string $address_number = '',
    public ?string $complement = '',
    public string  $district,
    public int     $city_id,
    public ?string $reference_point = '',
    public ?string $phone_1 = '',
    public ?string $phone_2 = '',
    public ?string $phone_3 = '',
    public ?string $company_email = '',
    public ?string $financial_email = '',
    public ?string $internet_page = '',
    public ?string $note = '',
    public ?string $created_at = '',
    public ?string $updated_at = '',
    public City|array|null $city,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
