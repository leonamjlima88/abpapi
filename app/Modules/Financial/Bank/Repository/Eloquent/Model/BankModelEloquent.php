<?php

namespace App\Modules\Financial\Bank\Repository\Eloquent\Model;

use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'bank';
  protected $fillable = [
    'code',
    'name',
  ];
  
  protected $casts = [
  ];
}