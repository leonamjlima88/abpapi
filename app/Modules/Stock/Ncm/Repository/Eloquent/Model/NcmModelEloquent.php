<?php

namespace App\Modules\Stock\Ncm\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NcmModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'ncm';
  protected $fillable = [
    'name',
    'code',
    'national_rate',
    'imported_rate',
    'state_rate',
    'municipal_rate',
    'additional_information',
    'start_of_validity',
    'end_of_validity',
  ];
  
  protected $casts = [
  ];
}