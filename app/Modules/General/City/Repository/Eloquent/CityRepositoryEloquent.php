<?php

namespace App\Modules\General\City\Repository\Eloquent;

use App\Modules\General\City\Entity\CityFilter;
use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\City\Repository\CityRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CityRepositoryEloquent extends BaseRepositoryEloquent implements CityRepositoryInterface
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
    return CityMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(?bool $defaultRelations = true): Builder
  {
    $query = $this->model->query();
    
    // Relações default da model
    if ($defaultRelations){
      $query->with([
        'state',
      ]);
    }
    return $query;
  }

  public function index(?CityFilter $cityFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($cityFilter->custom_search ?? []) > 0, function ($query) use ($cityFilter) {
        foreach ($cityFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('city.name', 'LIKE', $value)
                ->orWhere('city.id', 'LIKE', $value);
            });
        }});

    $filter = Arr::only((array) $cityFilter, self::FILTER_FIELDS_DEFAULT);
    $result = $this->getIndex($query, ...$filter);
    return $result;
  }

  protected function findById(int $id): ?Model
  {
    return $this->defaultQuery()
      ->where($this->model->getTable().'.id', $id)
      ->first();
  }
}