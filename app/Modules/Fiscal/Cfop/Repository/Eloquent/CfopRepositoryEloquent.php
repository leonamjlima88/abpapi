<?php

namespace App\Modules\Fiscal\Cfop\Repository\Eloquent;

use App\Modules\Fiscal\Cfop\Entity\CfopFilter;
use App\Modules\Fiscal\Cfop\Mapper\CfopMapper;
use App\Modules\Fiscal\Cfop\Repository\CfopRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CfopRepositoryEloquent extends BaseRepositoryEloquent implements CfopRepositoryInterface
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
    return CfopMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?CfopFilter $cfopFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($cfopFilter->custom_search ?? []) > 0, function ($query) use ($cfopFilter) {
        foreach ($cfopFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('cfop.name', 'LIKE', $value)
                  ->orWhere('cfop.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $cfopFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}