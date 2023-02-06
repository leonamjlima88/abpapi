<?php

namespace App\Modules\Stock\StorageLocation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\StorageLocation\Dto\StorageLocationDto;
use App\Modules\Stock\StorageLocation\Dto\StorageLocationFilterDto;
use App\Modules\Stock\StorageLocation\UseCase\StorageLocationDestroyUseCase;
use App\Modules\Stock\StorageLocation\UseCase\StorageLocationIndexUseCase;
use App\Modules\Stock\StorageLocation\UseCase\StorageLocationShowUseCase;
use App\Modules\Stock\StorageLocation\UseCase\StorageLocationStoreAndShowUseCase;
use App\Modules\Stock\StorageLocation\UseCase\StorageLocationUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class StorageLocationController extends Controller
{
  public function __construct(
    private readonly StorageLocationDestroyUseCase $storage_locationDestroyUseCase,
    private readonly StorageLocationIndexUseCase $storage_locationIndexUseCase,
    private readonly StorageLocationShowUseCase $storage_locationShowUseCase,
    private readonly StorageLocationStoreAndShowUseCase $storage_locationStoreAndShowUseCase,
    private readonly StorageLocationUpdateAndShowUseCase $storage_locationUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->storage_locationDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(StorageLocationFilterDto $storage_locationFilterDto)
  {
    $arrayResult = $this->storage_locationIndexUseCase->execute($storage_locationFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $storage_locationDtoFound = $this->storage_locationShowUseCase->execute($id);
    return ($storage_locationDtoFound)
      ? Res::success ($storage_locationDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(StorageLocationDto $storage_locationDto)
  {
    $storage_locationDtoStored = $this->storage_locationStoreAndShowUseCase->execute($storage_locationDto);
    return Res::success($storage_locationDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, StorageLocationDto $storage_locationDto)
  {
    $storage_locationDtoUpdated = $this->storage_locationUpdateAndShowUseCase->execute($id, $storage_locationDto);
    return Res::success($storage_locationDtoUpdated);
  }
}
