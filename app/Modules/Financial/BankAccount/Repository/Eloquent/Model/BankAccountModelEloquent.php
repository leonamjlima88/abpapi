<?php

namespace App\Modules\Financial\BankAccount\Repository\Eloquent\Model;

use App\Models\User;
use App\Modules\Financial\Bank\Repository\Eloquent\Model\BankModelEloquent;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankAccountModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'bank_account';
  protected $fillable = [
    'name',
    'bank_id',
    'note',
    'created_by_user_id',
    'updated_by_user_id',
    'tenant_id',
  ];
  
  protected $casts = [
  ];

  public function createdByUser()
  {
    return $this->hasOne(User::class, 'id', 'created_by_user_id');
  }

  public function updatedByUser()
  {
    return $this->hasOne(User::class, 'id', 'updated_by_user_id');
  }

  public function bank()
  {
    return $this->hasOne(BankModelEloquent::class, 'id', 'bank_id');
  }
}