<?php

namespace App\Modules\Financial\ChartOfAccount\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartOfAccountModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'chart_of_account';
  protected $fillable = [
    'name',
    'hierarchy_code',
    'is_analytical',
    'note',
    'created_by_user_id',
    'updated_by_user_id',
    'tenant_id',
  ];
  
  protected $casts = [
    'is_analytical' => 'boolean',
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