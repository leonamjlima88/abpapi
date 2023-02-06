<?php

namespace App\Modules\General\State\Repository\Eloquent;

use App\Modules\General\State\Entity\StateFilter;
use App\Modules\General\State\Mapper\StateMapper;
use App\Modules\General\State\Repository\StateRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class StateRepositoryEloquent extends BaseRepositoryEloquent implements StateRepositoryInterface
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
    return StateMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();      
  }

  public function index(?StateFilter $stateFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($stateFilter->custom_search ?? []) > 0, function ($query) use ($stateFilter) {
        foreach ($stateFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('state.name', 'LIKE', $value)
                ->orWhere('state.abbreviation', 'LIKE', $value)
                ->orWhere('state.id', 'LIKE', $value);
            });
        }});

    $filter = Arr::only((array) $stateFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}