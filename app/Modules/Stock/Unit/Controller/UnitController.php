<?php

namespace App\Modules\Stock\Unit\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Unit\Dto\UnitDto;
use App\Modules\Stock\Unit\Dto\UnitFilterDto;
use App\Modules\Stock\Unit\UseCase\UnitDestroyUseCase;
use App\Modules\Stock\Unit\UseCase\UnitIndexUseCase;
use App\Modules\Stock\Unit\UseCase\UnitShowUseCase;
use App\Modules\Stock\Unit\UseCase\UnitStoreAndShowUseCase;
use App\Modules\Stock\Unit\UseCase\UnitUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class UnitController extends Controller
{
  public function __construct(
    private readonly UnitDestroyUseCase $unitDestroyUseCase,
    private readonly UnitIndexUseCase $unitIndexUseCase,
    private readonly UnitShowUseCase $unitShowUseCase,
    private readonly UnitStoreAndShowUseCase $unitStoreAndShowUseCase,
    private readonly UnitUpdateAndShowUseCase $unitUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->unitDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(UnitFilterDto $unitFilterDto)
  {
    $arrayResult = $this->unitIndexUseCase->execute($unitFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $unitDtoFound = $this->unitShowUseCase->execute($id);
    return ($unitDtoFound)
      ? Res::success ($unitDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(UnitDto $unitDto)
  {
    $unitDtoStored = $this->unitStoreAndShowUseCase->execute($unitDto);
    return Res::success($unitDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, UnitDto $unitDto)
  {
    $unitDtoUpdated = $this->unitUpdateAndShowUseCase->execute($id, $unitDto);
    return Res::success($unitDtoUpdated);
  }
}
