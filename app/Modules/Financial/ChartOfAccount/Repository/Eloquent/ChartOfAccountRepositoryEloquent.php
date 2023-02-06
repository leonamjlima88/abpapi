<?php

namespace App\Modules\Financial\ChartOfAccount\Repository\Eloquent;

use App\Modules\Financial\ChartOfAccount\Entity\ChartOfAccountFilter;
use App\Modules\Financial\ChartOfAccount\Mapper\ChartOfAccountMapper;
use App\Modules\Financial\ChartOfAccount\Repository\ChartOfAccountRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ChartOfAccountRepositoryEloquent extends BaseRepositoryEloquent implements ChartOfAccountRepositoryInterface
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
    return ChartOfAccountMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?ChartOfAccountFilter $chart_of_accountFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($chart_of_accountFilter->custom_search ?? []) > 0, function ($query) use ($chart_of_accountFilter) {
        foreach ($chart_of_accountFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('chart_of_account.name', 'LIKE', $value)
                  ->orWhere('chart_of_account.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $chart_of_accountFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}