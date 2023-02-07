<?php

namespace App\Modules\General\Tenant\Repository\Eloquent;

use App\Modules\General\Tenant\Entity\TenantFilter;
use App\Modules\General\Tenant\Mapper\TenantMapper;
use App\Modules\General\Tenant\Repository\TenantRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class TenantRepositoryEloquent extends BaseRepositoryEloquent implements TenantRepositoryInterface
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
    return TenantMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(?bool $defaultRelations = true): Builder
  {
    $query = $this->model->query();
    
    // Relações default da model
    if ($defaultRelations){
      $query->with([
        'city.state'
      ]);
    }
    return $query;
  }

  public function index(?TenantFilter $tenantFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($tenantFilter->custom_search ?? []) > 0, function ($query) use ($tenantFilter) {
        foreach ($tenantFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('tenant.business_name', 'LIKE', $value)
                  ->orWhere('tenant.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $tenantFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}