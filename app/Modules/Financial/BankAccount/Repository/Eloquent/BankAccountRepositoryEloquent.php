<?php

namespace App\Modules\Financial\BankAccount\Repository\Eloquent;

use App\Modules\Financial\BankAccount\Entity\BankAccountFilter;
use App\Modules\Financial\BankAccount\Mapper\BankAccountMapper;
use App\Modules\Financial\BankAccount\Repository\BankAccountRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BankAccountRepositoryEloquent extends BaseRepositoryEloquent implements BankAccountRepositoryInterface
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
    $model->load(['bank']);
    return BankAccountMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(?bool $defaultRelations = true): Builder
  {
    $query = $this->model->query();
    
    // Relações default da model
    if ($defaultRelations){
      $query->with([
        'bank',
      ]);
    }
    return $query;  
  }

  public function index(?BankAccountFilter $bank_accountFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($bank_accountFilter->custom_search ?? []) > 0, function ($query) use ($bank_accountFilter) {
        foreach ($bank_accountFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('bank_account.name', 'LIKE', $value)
                  ->orWhere('bank_account.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $bank_accountFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}