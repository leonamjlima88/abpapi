<?php

namespace App\Modules\Stock\Category\Repository\Eloquent\Model;

use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'category';
  protected $fillable = [
    'name',
    'created_by_user_id',
    'updated_by_user_id',
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