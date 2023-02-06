<?php

namespace App\Modules\Financial\Document\Repository\Eloquent;

use App\Modules\Financial\Document\Entity\DocumentFilter;
use App\Modules\Financial\Document\Mapper\DocumentMapper;
use App\Modules\Financial\Document\Repository\DocumentRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class DocumentRepositoryEloquent extends BaseRepositoryEloquent implements DocumentRepositoryInterface
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
    return DocumentMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query();
  }

  public function index(?DocumentFilter $documentFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($documentFilter->custom_search ?? []) > 0, function ($query) use ($documentFilter) {
        foreach ($documentFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('document.name', 'LIKE', $value)
                  ->orWhere('document.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $documentFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }
}