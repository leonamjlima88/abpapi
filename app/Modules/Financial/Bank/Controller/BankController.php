<?php

namespace App\Modules\Financial\Bank\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\Bank\Dto\BankDto;
use App\Modules\Financial\Bank\Dto\BankFilterDto;
use App\Modules\Financial\Bank\UseCase\BankDestroyUseCase;
use App\Modules\Financial\Bank\UseCase\BankIndexUseCase;
use App\Modules\Financial\Bank\UseCase\BankShowUseCase;
use App\Modules\Financial\Bank\UseCase\BankStoreAndShowUseCase;
use App\Modules\Financial\Bank\UseCase\BankUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class BankController extends Controller
{
  public function __construct(
    private readonly BankDestroyUseCase $bankDestroyUseCase,
    private readonly BankIndexUseCase $bankIndexUseCase,
    private readonly BankShowUseCase $bankShowUseCase,
    private readonly BankStoreAndShowUseCase $bankStoreAndShowUseCase,
    private readonly BankUpdateAndShowUseCase $bankUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    $aux = 'teste';
    return $this->bankDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(BankFilterDto $bankFilterDto)
  {
    $arrayResult = $this->bankIndexUseCase->execute($bankFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $bankDtoFound = $this->bankShowUseCase->execute($id);
    return ($bankDtoFound)
      ? Res::success ($bankDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(BankDto $bankDto)
  {
    $bankDtoStored = $this->bankStoreAndShowUseCase->execute($bankDto);
    return Res::success($bankDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, BankDto $bankDto)
  {
    $bankDtoUpdated = $this->bankUpdateAndShowUseCase->execute($id, $bankDto);
    return Res::success($bankDtoUpdated);
  }
}
