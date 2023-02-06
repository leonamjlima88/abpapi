<?php

namespace App\Modules\Financial\PaymentTerm\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\PaymentTerm\Dto\PaymentTermDto;
use App\Modules\Financial\PaymentTerm\Dto\PaymentTermFilterDto;
use App\Modules\Financial\PaymentTerm\UseCase\PaymentTermDestroyUseCase;
use App\Modules\Financial\PaymentTerm\UseCase\PaymentTermIndexUseCase;
use App\Modules\Financial\PaymentTerm\UseCase\PaymentTermShowUseCase;
use App\Modules\Financial\PaymentTerm\UseCase\PaymentTermStoreAndShowUseCase;
use App\Modules\Financial\PaymentTerm\UseCase\PaymentTermUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class PaymentTermController extends Controller
{
  public function __construct(
    private readonly PaymentTermDestroyUseCase $payment_termDestroyUseCase,
    private readonly PaymentTermIndexUseCase $payment_termIndexUseCase,
    private readonly PaymentTermShowUseCase $payment_termShowUseCase,
    private readonly PaymentTermStoreAndShowUseCase $payment_termStoreAndShowUseCase,
    private readonly PaymentTermUpdateAndShowUseCase $payment_termUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->payment_termDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(PaymentTermFilterDto $payment_termFilterDto)
  {
    $arrayResult = $this->payment_termIndexUseCase->execute($payment_termFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $payment_termDtoFound = $this->payment_termShowUseCase->execute($id);
    return ($payment_termDtoFound)
      ? Res::success ($payment_termDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(PaymentTermDto $payment_termDto)
  {
    $payment_termDtoStored = $this->payment_termStoreAndShowUseCase->execute($payment_termDto);
    return Res::success($payment_termDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, PaymentTermDto $payment_termDto)
  {
    $payment_termDtoUpdated = $this->payment_termUpdateAndShowUseCase->execute($id, $payment_termDto);
    return Res::success($payment_termDtoUpdated);
  }
}
