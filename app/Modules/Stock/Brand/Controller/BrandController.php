<?php

namespace App\Modules\Stock\Brand\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Brand\Dto\BrandDto;
use App\Modules\Stock\Brand\Dto\BrandFilterDto;
use App\Modules\Stock\Brand\UseCase\BrandDestroyUseCase;
use App\Modules\Stock\Brand\UseCase\BrandIndexUseCase;
use App\Modules\Stock\Brand\UseCase\BrandShowUseCase;
use App\Modules\Stock\Brand\UseCase\BrandStoreAndShowUseCase;
use App\Modules\Stock\Brand\UseCase\BrandUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class BrandController extends Controller
{
  public function __construct(
    private readonly BrandDestroyUseCase $brandDestroyUseCase,
    private readonly BrandIndexUseCase $brandIndexUseCase,
    private readonly BrandShowUseCase $brandShowUseCase,
    private readonly BrandStoreAndShowUseCase $brandStoreAndShowUseCase,
    private readonly BrandUpdateAndShowUseCase $brandUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->brandDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(BrandFilterDto $brandFilterDto)
  {
    $arrayResult = $this->brandIndexUseCase->execute($brandFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $brandDtoFound = $this->brandShowUseCase->execute($id);
    return ($brandDtoFound)
      ? Res::success ($brandDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(BrandDto $brandDto)
  {
    $brandDtoStored = $this->brandStoreAndShowUseCase->execute($brandDto);
    return Res::success($brandDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, BrandDto $brandDto)
  {
    $brandDtoUpdated = $this->brandUpdateAndShowUseCase->execute($id, $brandDto);
    return Res::success($brandDtoUpdated);
  }
}
