<?php

namespace App\Modules\Stock\StorageLocation\Repository\Eloquent;

use App\Modules\Stock\StorageLocation\Entity\StorageLocationFilter;
use App\Modules\Stock\StorageLocation\Mapper\StorageLocationMapper;
use App\Modules\Stock\StorageLocation\Repository\StorageLocationRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class StorageLocationRepositoryEloquent extends BaseRepositoryEloquent implements StorageLocationRepositoryInterface
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
    return StorageLocationMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?StorageLocationFilter $storage_locationFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($storage_locationFilter->custom_search ?? []) > 0, function ($query) use ($storage_locationFilter) {
        foreach ($storage_locationFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('storage_location.name', 'LIKE', $value)
                  ->orWhere('storage_location.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $storage_locationFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}