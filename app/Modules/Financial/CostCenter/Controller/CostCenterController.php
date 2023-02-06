<?php

namespace App\Modules\Financial\CostCenter\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\CostCenter\Dto\CostCenterDto;
use App\Modules\Financial\CostCenter\Dto\CostCenterFilterDto;
use App\Modules\Financial\CostCenter\UseCase\CostCenterDestroyUseCase;
use App\Modules\Financial\CostCenter\UseCase\CostCenterIndexUseCase;
use App\Modules\Financial\CostCenter\UseCase\CostCenterShowUseCase;
use App\Modules\Financial\CostCenter\UseCase\CostCenterStoreAndShowUseCase;
use App\Modules\Financial\CostCenter\UseCase\CostCenterUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class CostCenterController extends Controller
{
  public function __construct(
    private readonly CostCenterDestroyUseCase $cost_centerDestroyUseCase,
    private readonly CostCenterIndexUseCase $cost_centerIndexUseCase,
    private readonly CostCenterShowUseCase $cost_centerShowUseCase,
    private readonly CostCenterStoreAndShowUseCase $cost_centerStoreAndShowUseCase,
    private readonly CostCenterUpdateAndShowUseCase $cost_centerUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->cost_centerDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(CostCenterFilterDto $cost_centerFilterDto)
  {
    $arrayResult = $this->cost_centerIndexUseCase->execute($cost_centerFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $cost_centerDtoFound = $this->cost_centerShowUseCase->execute($id);
    return ($cost_centerDtoFound)
      ? Res::success ($cost_centerDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(CostCenterDto $cost_centerDto)
  {
    $cost_centerDtoStored = $this->cost_centerStoreAndShowUseCase->execute($cost_centerDto);
    return Res::success($cost_centerDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, CostCenterDto $cost_centerDto)
  {
    $cost_centerDtoUpdated = $this->cost_centerUpdateAndShowUseCase->execute($id, $cost_centerDto);
    return Res::success($cost_centerDtoUpdated);
  }
}
