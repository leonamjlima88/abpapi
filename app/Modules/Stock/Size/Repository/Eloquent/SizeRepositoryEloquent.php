<?php

namespace App\Modules\Stock\Size\Repository\Eloquent;

use App\Modules\Stock\Size\Entity\SizeFilter;
use App\Modules\Stock\Size\Mapper\SizeMapper;
use App\Modules\Stock\Size\Repository\SizeRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class SizeRepositoryEloquent extends BaseRepositoryEloquent implements SizeRepositoryInterface
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
    return SizeMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?SizeFilter $sizeFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($sizeFilter->custom_search ?? []) > 0, function ($query) use ($sizeFilter) {
        foreach ($sizeFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('size.name', 'LIKE', $value)
                  ->orWhere('size.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $sizeFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}