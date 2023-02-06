<?php

namespace App\Modules\General\Tenant\Repository\Eloquent\Model;

use App\Modules\General\City\Repository\Eloquent\Model\CityModelEloquent;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenantModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'tenant';
  protected $fillable = [
    'business_name',
    'alias_name',
    'cnpj',
    'state_registration',
    'municipal_registration',
    'zip_code',
    'address',
    'address_number',
    'complement',
    'district',
    'city_id',
    'reference_point',
    'phone_1',
    'phone_2',
    'phone_3',
    'company_email',
    'financial_email',
    'internet_page',
    'note',
  ];
  
  protected $casts = [
  ];  

  public function city()
  {
    return $this->hasOne(CityModelEloquent::class, 'id', 'city_id');
  }

}