<?php

namespace App\Shared\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TenantScope implements Scope
{
  public function apply(Builder $builder, Model $model)
  {
    $user = Auth::user();
    if (in_array('tenant_id', $model->getFillable()) && $user) {
      $builder->where('tenant_id', $user->tenant_id);
    }
  }
}
