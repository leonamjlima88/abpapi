<?php

namespace App\Modules\General\Tenant\Controller;

use App\Http\Controllers\Controller;
use App\Modules\General\Tenant\Dto\TenantDto;
use App\Modules\General\Tenant\Dto\TenantFilterDto;
use App\Modules\General\Tenant\UseCase\TenantDestroyUseCase;
use App\Modules\General\Tenant\UseCase\TenantIndexUseCase;
use App\Modules\General\Tenant\UseCase\TenantShowUseCase;
use App\Modules\General\Tenant\UseCase\TenantStoreAndShowUseCase;
use App\Modules\General\Tenant\UseCase\TenantUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class TenantController extends Controller
{
  public function __construct(
    private readonly TenantDestroyUseCase $tenantDestroyUseCase,
    private readonly TenantIndexUseCase $tenantIndexUseCase,
    private readonly TenantShowUseCase $tenantShowUseCase,
    private readonly TenantStoreAndShowUseCase $tenantStoreAndShowUseCase,
    private readonly TenantUpdateAndShowUseCase $tenantUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->tenantDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(TenantFilterDto $tenantFilterDto)
  {
    $arrayResult = $this->tenantIndexUseCase->execute($tenantFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $tenantDtoFound = $this->tenantShowUseCase->execute($id);
    return ($tenantDtoFound)
      ? Res::success ($tenantDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(TenantDto $tenantDto)
  {
    $tenantDtoStored = $this->tenantStoreAndShowUseCase->execute($tenantDto);
    return Res::success($tenantDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, TenantDto $tenantDto)
  {
    $tenantDtoUpdated = $this->tenantUpdateAndShowUseCase->execute($id, $tenantDto);
    return Res::success($tenantDtoUpdated);
  }
}
