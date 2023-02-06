<?php

namespace App\Modules\Stock\Ncm\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Ncm\Dto\NcmDto;
use App\Modules\Stock\Ncm\Dto\NcmFilterDto;
use App\Modules\Stock\Ncm\UseCase\NcmDestroyUseCase;
use App\Modules\Stock\Ncm\UseCase\NcmIndexUseCase;
use App\Modules\Stock\Ncm\UseCase\NcmShowUseCase;
use App\Modules\Stock\Ncm\UseCase\NcmStoreAndShowUseCase;
use App\Modules\Stock\Ncm\UseCase\NcmUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class NcmController extends Controller
{
  public function __construct(
    private readonly NcmDestroyUseCase $ncmDestroyUseCase,
    private readonly NcmIndexUseCase $ncmIndexUseCase,
    private readonly NcmShowUseCase $ncmShowUseCase,
    private readonly NcmStoreAndShowUseCase $ncmStoreAndShowUseCase,
    private readonly NcmUpdateAndShowUseCase $ncmUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->ncmDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(NcmFilterDto $ncmFilterDto)
  {
    $arrayResult = $this->ncmIndexUseCase->execute($ncmFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $ncmDtoFound = $this->ncmShowUseCase->execute($id);
    return ($ncmDtoFound)
      ? Res::success ($ncmDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(NcmDto $ncmDto)
  {
    $ncmDtoStored = $this->ncmStoreAndShowUseCase->execute($ncmDto);
    return Res::success($ncmDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, NcmDto $ncmDto)
  {
    $ncmDtoUpdated = $this->ncmUpdateAndShowUseCase->execute($id, $ncmDto);
    return Res::success($ncmDtoUpdated);
  }
}
