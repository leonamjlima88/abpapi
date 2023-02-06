<?php

namespace App\Modules\General\City\Controller;

use App\Http\Controllers\Controller;
use App\Modules\General\City\Dto\CityDto;
use App\Modules\General\City\Dto\CityFilterDto;
use App\Modules\General\City\UseCase\CityDestroyUseCase;
use App\Modules\General\City\UseCase\CityIndexUseCase;
use App\Modules\General\City\UseCase\CityShowUseCase;
use App\Modules\General\City\UseCase\CityStoreAndShowUseCase;
use App\Modules\General\City\UseCase\CityUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class CityController extends Controller
{
  public function __construct(
    private readonly CityDestroyUseCase $cityDestroyUseCase,
    private readonly CityIndexUseCase $cityIndexUseCase,
    private readonly CityShowUseCase $cityShowUseCase,
    private readonly CityStoreAndShowUseCase $cityStoreAndShowUseCase,
    private readonly CityUpdateAndShowUseCase $cityUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->cityDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(CityFilterDto $cityFilterDto)
  {
    $arrayResult = $this->cityIndexUseCase->execute($cityFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $cityDtoFound = $this->cityShowUseCase->execute($id);
    return ($cityDtoFound)
      ? Res::success ($cityDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(CityDto $cityDto)
  {
    $cityDtoStored = $this->cityStoreAndShowUseCase->execute($cityDto);
    return Res::success($cityDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, CityDto $cityDto)
  {
    $cityDtoUpdated = $this->cityUpdateAndShowUseCase->execute($id, $cityDto);
    return Res::success($cityDtoUpdated);
  }
}
