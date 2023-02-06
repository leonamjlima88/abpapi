<?php

namespace App\Modules\Stock\Product\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Product\Dto\ProductDto;
use App\Modules\Stock\Product\Dto\ProductFilterDto;
use App\Modules\Stock\Product\UseCase\ProductDestroyUseCase;
use App\Modules\Stock\Product\UseCase\ProductIndexUseCase;
use App\Modules\Stock\Product\UseCase\ProductShowUseCase;
use App\Modules\Stock\Product\UseCase\ProductStoreAndShowUseCase;
use App\Modules\Stock\Product\UseCase\ProductUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  public function __construct(
    private readonly ProductDestroyUseCase $productDestroyUseCase,
    private readonly ProductIndexUseCase $productIndexUseCase,
    private readonly ProductShowUseCase $productShowUseCase,
    private readonly ProductStoreAndShowUseCase $productStoreAndShowUseCase,
    private readonly ProductUpdateAndShowUseCase $productUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->productDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(ProductFilterDto $productFilterDto)
  {
    $arrayResult = $this->productIndexUseCase->execute($productFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $productDtoFound = $this->productShowUseCase->execute($id);
    return ($productDtoFound)
      ? Res::success ($productDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(ProductDto $productDto)
  {
    $productDtoStored = $this->productStoreAndShowUseCase->execute($productDto);
    return Res::success($productDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, ProductDto $productDto)
  {
    $productDtoUpdated = $this->productUpdateAndShowUseCase->execute($id, $productDto);
    return Res::success($productDtoUpdated);
  }
}
