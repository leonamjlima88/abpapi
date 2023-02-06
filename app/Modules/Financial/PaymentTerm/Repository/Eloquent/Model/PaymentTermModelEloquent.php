<?php

namespace App\Modules\Financial\PaymentTerm\Repository\Eloquent\Model;

use App\Models\User;
use App\Modules\Financial\BankAccount\Repository\Eloquent\Model\BankAccountModelEloquent;
use App\Modules\Financial\Document\Repository\Eloquent\Model\DocumentModelEloquent;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentTermModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'payment_term';
  protected $fillable = [
    'name',
    'number_of_installments',
    'first_installment_in',
    'interval_between_installments',
    'bank_account_id',
    'document_id',
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

  public function bankAccount()
  {
    return $this->hasOne(BankAccountModelEloquent::class, 'id', 'bank_account_id');
  }

  public function document()
  {
    return $this->hasOne(DocumentModelEloquent::class, 'id', 'document_id');
  }
}