<?php

namespace App\Modules\Stock\StorageLocation\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StorageLocationModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'storage_location';
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