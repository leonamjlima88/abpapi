<?php

namespace App\Modules\General\State\Controller;

use App\Http\Controllers\Controller;
use App\Modules\General\State\Dto\StateDto;
use App\Modules\General\State\Dto\StateFilterDto;
use App\Modules\General\State\UseCase\StateDestroyUseCase;
use App\Modules\General\State\UseCase\StateIndexUseCase;
use App\Modules\General\State\UseCase\StateShowUseCase;
use App\Modules\General\State\UseCase\StateStoreAndShowUseCase;
use App\Modules\General\State\UseCase\StateUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class StateController extends Controller
{
  public function __construct(
    private readonly StateDestroyUseCase $stateDestroyUseCase,
    private readonly StateIndexUseCase $stateIndexUseCase,
    private readonly StateShowUseCase $stateShowUseCase,
    private readonly StateStoreAndShowUseCase $stateStoreAndShowUseCase,
    private readonly StateUpdateAndShowUseCase $stateUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->stateDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(StateFilterDto $stateFilterDto)
  {
    $arrayResult = $this->stateIndexUseCase->execute($stateFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $stateDtoFound = $this->stateShowUseCase->execute($id);
    return ($stateDtoFound)
      ? Res::success ($stateDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(StateDto $stateDto)
  {
    $stateDtoStored = $this->stateStoreAndShowUseCase->execute($stateDto);
    return Res::success($stateDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, StateDto $stateDto)
  {
    $stateDtoUpdated = $this->stateUpdateAndShowUseCase->execute($id, $stateDto);
    return Res::success($stateDtoUpdated);
  }
}
