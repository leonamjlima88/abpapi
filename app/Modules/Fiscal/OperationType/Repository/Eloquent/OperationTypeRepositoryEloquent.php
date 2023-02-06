<?php

namespace App\Modules\Fiscal\OperationType\Repository\Eloquent;

use App\Modules\Fiscal\OperationType\Entity\OperationTypeFilter;
use App\Modules\Fiscal\OperationType\Mapper\OperationTypeMapper;
use App\Modules\Fiscal\OperationType\Repository\OperationTypeRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class OperationTypeRepositoryEloquent extends BaseRepositoryEloquent implements OperationTypeRepositoryInterface
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
    return OperationTypeMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?OperationTypeFilter $operation_typeFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($operation_typeFilter->custom_search ?? []) > 0, function ($query) use ($operation_typeFilter) {
        foreach ($operation_typeFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('operation_type.name', 'LIKE', $value)
                  ->orWhere('operation_type.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $operation_typeFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}