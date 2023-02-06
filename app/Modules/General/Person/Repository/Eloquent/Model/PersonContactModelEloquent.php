<?php

namespace App\Modules\General\Person\Repository\Eloquent\Model;

use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonContactModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'person_contact';
  protected $fillable = [
    'person_id',
    'name',
    'cnpj',
    'type',
    'note',
    'phone',
    'email',
  ];
  
  protected $casts = [
  ];
  
  public $timestamps = false;
}
