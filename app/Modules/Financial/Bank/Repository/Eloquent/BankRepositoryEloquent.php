<?php

namespace App\Modules\Financial\Bank\Repository\Eloquent;

use App\Modules\Financial\Bank\Entity\BankFilter;
use App\Modules\Financial\Bank\Mapper\BankMapper;
use App\Modules\Financial\Bank\Repository\BankRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BankRepositoryEloquent extends BaseRepositoryEloquent implements BankRepositoryInterface
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
    return BankMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(?bool $defaultRelations = true): Builder
  {
    return $this->model->query();
  }

  public function index(?BankFilter $bankFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($bankFilter->custom_search ?? []) > 0, function ($query) use ($bankFilter) {
        foreach ($bankFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('bank.name', 'LIKE', $value)
                  ->orWhere('bank.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $bankFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}