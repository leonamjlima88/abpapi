<?php

namespace App\Modules\Financial\BankAccount\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\BankAccount\Dto\BankAccountDto;
use App\Modules\Financial\BankAccount\Dto\BankAccountFilterDto;
use App\Modules\Financial\BankAccount\UseCase\BankAccountDestroyUseCase;
use App\Modules\Financial\BankAccount\UseCase\BankAccountIndexUseCase;
use App\Modules\Financial\BankAccount\UseCase\BankAccountShowUseCase;
use App\Modules\Financial\BankAccount\UseCase\BankAccountStoreAndShowUseCase;
use App\Modules\Financial\BankAccount\UseCase\BankAccountUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class BankAccountController extends Controller
{
  public function __construct(
    private readonly BankAccountDestroyUseCase $bank_accountDestroyUseCase,
    private readonly BankAccountIndexUseCase $bank_accountIndexUseCase,
    private readonly BankAccountShowUseCase $bank_accountShowUseCase,
    private readonly BankAccountStoreAndShowUseCase $bank_accountStoreAndShowUseCase,
    private readonly BankAccountUpdateAndShowUseCase $bank_accountUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->bank_accountDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(BankAccountFilterDto $bank_accountFilterDto)
  {
    $arrayResult = $this->bank_accountIndexUseCase->execute($bank_accountFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $bank_accountDtoFound = $this->bank_accountShowUseCase->execute($id);
    return ($bank_accountDtoFound)
      ? Res::success ($bank_accountDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(BankAccountDto $bank_accountDto)
  {
    $bank_accountDtoStored = $this->bank_accountStoreAndShowUseCase->execute($bank_accountDto);
    return Res::success($bank_accountDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, BankAccountDto $bank_accountDto)
  {
    $bank_accountDtoUpdated = $this->bank_accountUpdateAndShowUseCase->execute($id, $bank_accountDto);
    return Res::success($bank_accountDtoUpdated);
  }
}
