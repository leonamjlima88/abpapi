<?php

namespace App\Modules\Financial\Document\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'document';
  protected $fillable = [
    'name',
    'is_release_as_completed',
    'created_by_user_id',
    'updated_by_user_id',
    'tenant_id',
  ];
  
  protected $casts = [
    'is_release_as_completed' => 'boolean',
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