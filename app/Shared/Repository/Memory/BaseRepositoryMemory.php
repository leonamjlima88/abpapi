<?php

namespace App\Shared\Repository\Memory;

use App\Shared\Entity\BaseEntity;
use App\Shared\Repository\BaseRepositoryInterface;

class BaseRepositoryMemory implements BaseRepositoryInterface
{
  public array $list = []; // Brand[]
  protected bool $inTransaction = true;
  public function __construct(){}  
  
  public function store(BaseEntity $entity): int
  {
    $nextId = 1;
    $last_item = end($this->list);
    if ($last_item){
      $nextId = $last_item->id + 1;
    }

    $entity->id = $nextId;
    $this->list[] = $entity;

    return $nextId;
  }

  public function show(int $id): ?BaseEntity
  {
    $entityFiltered = array_filter($this->list, fn($value) => $value->id === $id);
    return (count($entityFiltered) > 0) 
      ? reset($entityFiltered)
      : null;
  }

  public function update(int $id, BaseEntity $entity): bool
  {
    $this->list = array_filter($this->list, fn($value) => $value->id !== $id);
    $entity->id = $id;
    $this->list[] = $entity;

    return true;
  }

  public function destroy(int $id): bool
  {
    $this->list = array_filter($this->list, fn($value) => $value->id !== $id);
    return true;
  }

  public function setTransaction(bool $value): void {}
  public function startTransaction(): void {}
  public function commitTransaction(): void {}
  public function rollBackTransaction(): void {}
}