<?php

namespace App\Modules\Stock\Product\Repository\Eloquent;

use App\Modules\Stock\Product\Entity\ProductFilter;
use App\Modules\Stock\Product\Mapper\ProductMapper;
use App\Modules\Stock\Product\Repository\ProductRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductRepositoryEloquent extends BaseRepositoryEloquent implements ProductRepositoryInterface
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
    return ProductMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?ProductFilter $productFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($productFilter->custom_search ?? []) > 0, function ($query) use ($productFilter) {
        foreach ($productFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('product.name', 'LIKE', $value)
                  ->orWhere('product.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $productFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}