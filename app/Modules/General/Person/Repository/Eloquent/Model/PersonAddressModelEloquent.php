<?php

namespace App\Modules\General\Person\Repository\Eloquent\Model;

use App\Modules\General\City\Repository\Eloquent\Model\CityModelEloquent;
use App\Modules\General\Person\Repository\Enum\PersonAddressTypeEnum;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonAddressModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'person_address';
  protected $fillable = [
    'person_id',
    'type',
    'zip_code',
    'address',
    'address_number',
    'complement',
    'district',
    'city_id',
    'reference_point',
  ];
  
  protected $casts = [
    'type' => PersonAddressTypeEnum::class,  
  ];

  public $timestamps = false;

  public function city()
  {
    return $this->hasOne(CityModelEloquent::class, 'id', 'city_id');
  }
}