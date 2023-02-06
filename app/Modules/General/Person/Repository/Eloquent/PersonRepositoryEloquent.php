<?php

namespace App\Modules\General\Person\Repository\Eloquent;

use App\Modules\General\Person\Entity\PersonFilter;
use App\Modules\General\Person\Mapper\PersonMapper;
use App\Modules\General\Person\Repository\PersonRepositoryInterface;
use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\Eloquent\BaseRepositoryEloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PersonRepositoryEloquent extends BaseRepositoryEloquent implements PersonRepositoryInterface
{
  protected bool $inTransaction = true;    
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
    $model->load([
      'personContact', 
      'personAddress.city.state'
    ]);

    return PersonMapper::mapArrayToEntity($model->toArray());
  }

  public function defaultQuery(): Builder
  {
    return $this->model->query()
      ->with(['city', 'city.state']);
  }

  public function index(?PersonFilter $personFilter = null): array
  {
    $query = $this->defaultQuery()
      ->when(count($personFilter->custom_search ?? []) > 0, function ($query) use ($personFilter) {
        foreach ($personFilter->custom_search as $value) {
            $value = "%{$value}%";
            $query->where(function ($query) use ($value) {
              $query->where('person.name', 'LIKE', $value)
                  ->orWhere('person.id', 'LIKE', $value);                    
            });
        }});

    $filter = Arr::only((array) $personFilter, self::FILTER_FIELDS_DEFAULT);
    return $this->getIndex($query, ...$filter);
  }

  public function store(BaseEntity $entity): int
  {
    // Método anônimo para incluir
    $data = objectToArray($entity);
    $executeStore = function ($data) {
      $modelStored = $this->model->create($data);
      $modelStored->personContact()->createMany($data['person_contact']);
      $modelStored->personAddress()->createMany($data['person_address']);
      
      return $modelStored->id;
    };

    // Controle de Transação
    return match ($this->inTransaction) {
        true => DB::transaction(fn () => $executeStore($data)),
        false => $executeStore($data),
    };
  }

  public function update(int $id, BaseEntity $entity): bool
  {
    $data = Arr::except(objectToArray($entity), self::REMOVE_THIS_COLUMNS_ON_UPDATE);
    $data['id'] = $id;

    $executeUpdate = function ($data) use ($id) {
      $modelFound = $this->model->find($id);
      throw_if(!$modelFound, new Exception(trans('validation.record_not_found').' ID: '.$id));
      
      tap($modelFound)->update($data);
      $modelFound->personContact()->delete();
      $modelFound->personContact()->createMany($data['person_contact']);
      $modelFound->personAddress()->delete();
      $modelFound->personAddress()->createMany($data['person_address']);

      return true;
    };

    return match ($this->inTransaction) {
        true => DB::transaction(fn () => $executeUpdate($data)),
        false => $executeUpdate($data),
    };
  }
}