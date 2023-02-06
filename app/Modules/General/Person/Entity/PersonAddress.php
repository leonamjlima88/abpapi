<?php

namespace App\Modules\General\Person\Entity;

use App\Modules\General\City\Entity\City;
use App\Modules\General\Person\Repository\Enum\PersonAddressTypeEnum;
use App\Shared\Entity\BaseEntity;

class PersonAddress extends BaseEntity
{
  public function __construct(
    public ?int $id = 0, 
    public ?int $person_id = 0, 
    public PersonAddressTypeEnum|int|null $type,
    public ?string $zip_code = '',
    public string $address,
    public ?string $address_number = '',
    public ?string $complement = '',
    public string $district,
    public int $city_id,
    public ?string $reference_point = '',

    // Campo virtual
    public City|array|null $city,    
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
