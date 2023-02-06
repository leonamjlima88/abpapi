<?php

namespace App\Modules\Fiscal\Cfop\Repository\Eloquent\Model;

use App\Models\User;
use App\Modules\Fiscal\Cfop\Repository\Enum\CfopOperationTypeEnum;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CfopModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'cfop';
  protected $fillable = [
    'name',
    'code',
    'operation_type',
  ];
  
  protected $casts = [
    'operation_type' => CfopOperationTypeEnum::class
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