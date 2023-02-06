<?php

namespace App\Modules\Financial\PaymentTerm\Repository\Eloquent;

use App\Modules\Financial\PaymentTerm\Entity\PaymentTermFilter;
use App\Modules\Financial\PaymentTerm\Mapper\PaymentTermMapper;
use App\Modules\Financial\PaymentTerm\Repository\PaymentTermRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class PaymentTermRepositoryEloquent extends BaseRepositoryEloquent implements PaymentTermRepositoryInterface
{
  protected bool $inTransaction = false;    
  public function __construct(private Model $model){
      parent::__construct($model);
  }  
  
  /**
   * Converter Model para Entity
   *
   * @param Model $model
   * @return BaseEntity
   */
  public function modelToEntity(Model $model): BaseEntity 
  {
    $model->load([
      'bankAccount.bank', 
      'document'
    ]);
    return PaymentTermMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query()
      ->with([
        'bankAccount', 
        'document'
      ]);
  }

  public function index(?PaymentTermFilter $payment_termFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($payment_termFilter->custom_search ?? []) > 0, function ($query) use ($payment_termFilter) {
        foreach ($payment_termFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('payment_term.name', 'LIKE', $value)
                  ->orWhere('payment_term.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $payment_termFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}