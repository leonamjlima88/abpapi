<?php

namespace App\Modules\Financial\CostCenter\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CostCenterModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'cost_center';
  protected $fillable = [
    'name',
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
}