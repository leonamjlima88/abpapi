<?php

namespace App\Modules\Stock\Ncm\Repository\Eloquent;

use App\Modules\Stock\Ncm\Entity\NcmFilter;
use App\Modules\Stock\Ncm\Mapper\NcmMapper;
use App\Modules\Stock\Ncm\Repository\NcmRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class NcmRepositoryEloquent extends BaseRepositoryEloquent implements NcmRepositoryInterface
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
    return NcmMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?NcmFilter $ncmFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($ncmFilter->custom_search ?? []) > 0, function ($query) use ($ncmFilter) {
        foreach ($ncmFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('ncm.name', 'LIKE', $value)
                  ->orWhere('ncm.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $ncmFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}