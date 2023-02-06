<?php

namespace App\Modules\Stock\Category\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Stock\Category\Dto\CategoryDto;
use App\Modules\Stock\Category\Dto\CategoryFilterDto;
use App\Modules\Stock\Category\UseCase\CategoryDestroyUseCase;
use App\Modules\Stock\Category\UseCase\CategoryIndexUseCase;
use App\Modules\Stock\Category\UseCase\CategoryShowUseCase;
use App\Modules\Stock\Category\UseCase\CategoryStoreAndShowUseCase;
use App\Modules\Stock\Category\UseCase\CategoryUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
  public function __construct(
    private readonly CategoryDestroyUseCase $categoryDestroyUseCase,
    private readonly CategoryIndexUseCase $categoryIndexUseCase,
    private readonly CategoryShowUseCase $categoryShowUseCase,
    private readonly CategoryStoreAndShowUseCase $categoryStoreAndShowUseCase,
    private readonly CategoryUpdateAndShowUseCase $categoryUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->categoryDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(CategoryFilterDto $categoryFilterDto)
  {
    $arrayResult = $this->categoryIndexUseCase->execute($categoryFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $categoryDtoFound = $this->categoryShowUseCase->execute($id);
    return ($categoryDtoFound)
      ? Res::success ($categoryDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(CategoryDto $categoryDto)
  {
    $categoryDtoStored = $this->categoryStoreAndShowUseCase->execute($categoryDto);
    return Res::success($categoryDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, CategoryDto $categoryDto)
  {
    $categoryDtoUpdated = $this->categoryUpdateAndShowUseCase->execute($id, $categoryDto);
    return Res::success($categoryDtoUpdated);
  }
}
