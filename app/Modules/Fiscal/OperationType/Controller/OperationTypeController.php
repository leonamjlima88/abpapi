<?php

namespace App\Modules\Fiscal\OperationType\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Fiscal\OperationType\Dto\OperationTypeDto;
use App\Modules\Fiscal\OperationType\Dto\OperationTypeFilterDto;
use App\Modules\Fiscal\OperationType\UseCase\OperationTypeDestroyUseCase;
use App\Modules\Fiscal\OperationType\UseCase\OperationTypeIndexUseCase;
use App\Modules\Fiscal\OperationType\UseCase\OperationTypeShowUseCase;
use App\Modules\Fiscal\OperationType\UseCase\OperationTypeStoreAndShowUseCase;
use App\Modules\Fiscal\OperationType\UseCase\OperationTypeUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class OperationTypeController extends Controller
{
  public function __construct(
    private readonly OperationTypeDestroyUseCase $operation_typeDestroyUseCase,
    private readonly OperationTypeIndexUseCase $operation_typeIndexUseCase,
    private readonly OperationTypeShowUseCase $operation_typeShowUseCase,
    private readonly OperationTypeStoreAndShowUseCase $operation_typeStoreAndShowUseCase,
    private readonly OperationTypeUpdateAndShowUseCase $operation_typeUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->operation_typeDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(OperationTypeFilterDto $operation_typeFilterDto)
  {
    $arrayResult = $this->operation_typeIndexUseCase->execute($operation_typeFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $operation_typeDtoFound = $this->operation_typeShowUseCase->execute($id);
    return ($operation_typeDtoFound)
      ? Res::success ($operation_typeDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(OperationTypeDto $operation_typeDto)
  {
    $operation_typeDtoStored = $this->operation_typeStoreAndShowUseCase->execute($operation_typeDto);
    return Res::success($operation_typeDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, OperationTypeDto $operation_typeDto)
  {
    $operation_typeDtoUpdated = $this->operation_typeUpdateAndShowUseCase->execute($id, $operation_typeDto);
    return Res::success($operation_typeDtoUpdated);
  }
}
