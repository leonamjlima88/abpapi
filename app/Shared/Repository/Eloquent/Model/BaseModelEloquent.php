<?php

namespace App\Shared\Repository\Eloquent\Model;

use App\Modules\General\Tenant\Repository\Eloquent\Model\TenantModelEloquent;
use App\Shared\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModelEloquent extends Model
{
  public static function boot()
  {
    parent::boot();
    static::addGlobalScope(new TenantScope);

    static::saving(function ($model) {
      $user = Auth::user();
      if (in_array('tenant_id', $model->getFillable()) && $user) {
        $model->tenant_id = $user->tenant_id;
      }
    });

    static::creating(function ($model) {
      $user = Auth::user();
      if (in_array('created_by_user_id', $model->getFillable()) && $user) {
        $model->created_by_user_id = $user->id;
      }
    });

    static::updating(function ($model) {
      $user = Auth::user();
      if (in_array('updated_by_user_id', $model->getFillable()) && $user) {
        $model->updated_by_user_id = $user->id;
      }
    });
  }

  public function tenant()
  {
    return $this->hasOne(TenantModelEloquent::class, 'id', 'tenant_id');
  }
}