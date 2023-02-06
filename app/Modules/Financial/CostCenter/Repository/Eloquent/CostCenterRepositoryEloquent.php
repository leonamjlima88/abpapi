<?php

namespace App\Modules\Financial\CostCenter\Repository\Eloquent;

use App\Modules\Financial\CostCenter\Entity\CostCenterFilter;
use App\Modules\Financial\CostCenter\Mapper\CostCenterMapper;
use App\Modules\Financial\CostCenter\Repository\CostCenterRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CostCenterRepositoryEloquent extends BaseRepositoryEloquent implements CostCenterRepositoryInterface
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
    return CostCenterMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?CostCenterFilter $cost_centerFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($cost_centerFilter->custom_search ?? []) > 0, function ($query) use ($cost_centerFilter) {
        foreach ($cost_centerFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('cost_center.name', 'LIKE', $value)
                  ->orWhere('cost_center.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $cost_centerFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}