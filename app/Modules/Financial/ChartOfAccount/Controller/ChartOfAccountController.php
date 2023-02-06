<?php

namespace App\Modules\Financial\ChartOfAccount\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountDto;
use App\Modules\Financial\ChartOfAccount\Dto\ChartOfAccountFilterDto;
use App\Modules\Financial\ChartOfAccount\UseCase\ChartOfAccountDestroyUseCase;
use App\Modules\Financial\ChartOfAccount\UseCase\ChartOfAccountIndexUseCase;
use App\Modules\Financial\ChartOfAccount\UseCase\ChartOfAccountShowUseCase;
use App\Modules\Financial\ChartOfAccount\UseCase\ChartOfAccountStoreAndShowUseCase;
use App\Modules\Financial\ChartOfAccount\UseCase\ChartOfAccountUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class ChartOfAccountController extends Controller
{
  public function __construct(
    private readonly ChartOfAccountDestroyUseCase $chart_of_accountDestroyUseCase,
    private readonly ChartOfAccountIndexUseCase $chart_of_accountIndexUseCase,
    private readonly ChartOfAccountShowUseCase $chart_of_accountShowUseCase,
    private readonly ChartOfAccountStoreAndShowUseCase $chart_of_accountStoreAndShowUseCase,
    private readonly ChartOfAccountUpdateAndShowUseCase $chart_of_accountUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->chart_of_accountDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(ChartOfAccountFilterDto $chart_of_accountFilterDto)
  {
    $arrayResult = $this->chart_of_accountIndexUseCase->execute($chart_of_accountFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $chart_of_accountDtoFound = $this->chart_of_accountShowUseCase->execute($id);
    return ($chart_of_accountDtoFound)
      ? Res::success ($chart_of_accountDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(ChartOfAccountDto $chart_of_accountDto)
  {
    $chart_of_accountDtoStored = $this->chart_of_accountStoreAndShowUseCase->execute($chart_of_accountDto);
    return Res::success($chart_of_accountDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, ChartOfAccountDto $chart_of_accountDto)
  {
    $chart_of_accountDtoUpdated = $this->chart_of_accountUpdateAndShowUseCase->execute($id, $chart_of_accountDto);
    return Res::success($chart_of_accountDtoUpdated);
  }
}
