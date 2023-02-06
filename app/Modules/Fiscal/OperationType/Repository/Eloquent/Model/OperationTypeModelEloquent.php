<?php

namespace App\Modules\Fiscal\OperationType\Repository\Eloquent\Model;

use App\Models\User;
use App\Modules\Fiscal\OperationType\Repository\Enum\OperationTypeDocumentTypeEnum;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperationTypeModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'operation_type';
  protected $fillable = [
    'name',
    'document_type',
    'issue_purpose',
    'operation_nature_description',
    'created_by_user_id',
    'updated_by_user_id',
    'tenant_id',
  ];
  
  protected $casts = [
    'document_type' => OperationTypeDocumentTypeEnum::class,
    'issue_purpose' => OperationTypeDocumentTypeEnum::class,
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