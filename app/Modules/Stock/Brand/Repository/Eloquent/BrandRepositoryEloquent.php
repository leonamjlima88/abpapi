<?php

namespace App\Modules\Stock\Brand\Repository\Eloquent;

use App\Modules\Stock\Brand\Entity\BrandFilter;
use App\Modules\Stock\Brand\Mapper\BrandMapper;
use App\Modules\Stock\Brand\Repository\BrandRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BrandRepositoryEloquent extends BaseRepositoryEloquent implements BrandRepositoryInterface
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
    return BrandMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?BrandFilter $brandFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($brandFilter->custom_search ?? []) > 0, function ($query) use ($brandFilter) {
        foreach ($brandFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('brand.name', 'LIKE', $value)
                  ->orWhere('brand.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $brandFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}