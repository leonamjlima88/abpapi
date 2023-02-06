<?php

namespace App\Modules\Fiscal\Cfop\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Fiscal\Cfop\Dto\CfopDto;
use App\Modules\Fiscal\Cfop\Dto\CfopFilterDto;
use App\Modules\Fiscal\Cfop\UseCase\CfopDestroyUseCase;
use App\Modules\Fiscal\Cfop\UseCase\CfopIndexUseCase;
use App\Modules\Fiscal\Cfop\UseCase\CfopShowUseCase;
use App\Modules\Fiscal\Cfop\UseCase\CfopStoreAndShowUseCase;
use App\Modules\Fiscal\Cfop\UseCase\CfopUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class CfopController extends Controller
{
  public function __construct(
    private readonly CfopDestroyUseCase $cfopDestroyUseCase,
    private readonly CfopIndexUseCase $cfopIndexUseCase,
    private readonly CfopShowUseCase $cfopShowUseCase,
    private readonly CfopStoreAndShowUseCase $cfopStoreAndShowUseCase,
    private readonly CfopUpdateAndShowUseCase $cfopUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->cfopDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(CfopFilterDto $cfopFilterDto)
  {
    $arrayResult = $this->cfopIndexUseCase->execute($cfopFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $cfopDtoFound = $this->cfopShowUseCase->execute($id);
    return ($cfopDtoFound)
      ? Res::success ($cfopDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(CfopDto $cfopDto)
  {
    $cfopDtoStored = $this->cfopStoreAndShowUseCase->execute($cfopDto);
    return Res::success($cfopDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, CfopDto $cfopDto)
  {
    $cfopDtoUpdated = $this->cfopUpdateAndShowUseCase->execute($id, $cfopDto);
    return Res::success($cfopDtoUpdated);
  }
}
