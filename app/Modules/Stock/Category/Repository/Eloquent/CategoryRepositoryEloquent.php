<?php

namespace App\Modules\Stock\Category\Repository\Eloquent;

use App\Modules\Stock\Category\Entity\CategoryFilter;
use App\Modules\Stock\Category\Mapper\CategoryMapper;
use App\Modules\Stock\Category\Repository\CategoryRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CategoryRepositoryEloquent extends BaseRepositoryEloquent implements CategoryRepositoryInterface
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
    return CategoryMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(?bool $defaultRelations = true): Builder
  {
    return $this->model->query();
  }

  public function index(?CategoryFilter $categoryFilter = null): array
  {
    $query = $this->model->query()
      ->when(count($categoryFilter->custom_search ?? []) > 0, function ($query) use ($categoryFilter) {
        foreach ($categoryFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('category.name', 'LIKE', $value)
                  ->orWhere('category.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $categoryFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}