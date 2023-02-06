<?php

namespace App\Modules\Stock\Unit\Repository\Eloquent;

use App\Modules\Stock\Unit\Entity\UnitFilter;
use App\Modules\Stock\Unit\Mapper\UnitMapper;
use App\Modules\Stock\Unit\Repository\UnitRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class UnitRepositoryEloquent extends BaseRepositoryEloquent implements UnitRepositoryInterface
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
    return UnitMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?UnitFilter $unitFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($unitFilter->custom_search ?? []) > 0, function ($query) use ($unitFilter) {
        foreach ($unitFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('unit.name', 'LIKE', $value)
                  ->orWhere('unit.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $unitFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}