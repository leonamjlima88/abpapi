<?php

namespace App\Modules\Stock\Size\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Size\Dto\SizeDto;
use App\Modules\Stock\Size\Dto\SizeFilterDto;
use App\Modules\Stock\Size\UseCase\SizeDestroyUseCase;
use App\Modules\Stock\Size\UseCase\SizeIndexUseCase;
use App\Modules\Stock\Size\UseCase\SizeShowUseCase;
use App\Modules\Stock\Size\UseCase\SizeStoreAndShowUseCase;
use App\Modules\Stock\Size\UseCase\SizeUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class SizeController extends Controller
{
  public function __construct(
    private readonly SizeDestroyUseCase $sizeDestroyUseCase,
    private readonly SizeIndexUseCase $sizeIndexUseCase,
    private readonly SizeShowUseCase $sizeShowUseCase,
    private readonly SizeStoreAndShowUseCase $sizeStoreAndShowUseCase,
    private readonly SizeUpdateAndShowUseCase $sizeUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->sizeDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(SizeFilterDto $sizeFilterDto)
  {
    $arrayResult = $this->sizeIndexUseCase->execute($sizeFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $sizeDtoFound = $this->sizeShowUseCase->execute($id);
    return ($sizeDtoFound)
      ? Res::success ($sizeDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(SizeDto $sizeDto)
  {
    $sizeDtoStored = $this->sizeStoreAndShowUseCase->execute($sizeDto);
    return Res::success($sizeDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, SizeDto $sizeDto)
  {
    $sizeDtoUpdated = $this->sizeUpdateAndShowUseCase->execute($id, $sizeDto);
    return Res::success($sizeDtoUpdated);
  }
}
