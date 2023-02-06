<?php

namespace App\Modules\Financial\Document\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Financial\Document\Dto\DocumentDto;
use App\Modules\Financial\Document\Dto\DocumentFilterDto;
use App\Modules\Financial\Document\UseCase\DocumentDestroyUseCase;
use App\Modules\Financial\Document\UseCase\DocumentIndexUseCase;
use App\Modules\Financial\Document\UseCase\DocumentShowUseCase;
use App\Modules\Financial\Document\UseCase\DocumentStoreAndShowUseCase;
use App\Modules\Financial\Document\UseCase\DocumentUpdateAndShowUseCase;
use App\Shared\Util\Response\Res;
use Illuminate\Http\Response;

class DocumentController extends Controller
{
  public function __construct(
    private readonly DocumentDestroyUseCase $documentDestroyUseCase,
    private readonly DocumentIndexUseCase $documentIndexUseCase,
    private readonly DocumentShowUseCase $documentShowUseCase,
    private readonly DocumentStoreAndShowUseCase $documentStoreAndShowUseCase,
    private readonly DocumentUpdateAndShowUseCase $documentUpdateAndShowUseCase,
  ){
  }
  
  public function destroy(int $id)
  {
    return $this->documentDestroyUseCase->execute($id) 
      ? Res::success (code: Response::HTTP_NO_CONTENT)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function index(DocumentFilterDto $documentFilterDto)
  {
    $arrayResult = $this->documentIndexUseCase->execute($documentFilterDto);
    return Res::success($arrayResult);
  }

  public function show(int $id)
  {
    $documentDtoFound = $this->documentShowUseCase->execute($id);
    return ($documentDtoFound)
      ? Res::success ($documentDtoFound)
      : Res::error   (code: Response::HTTP_NOT_FOUND);
  }

  public function store(DocumentDto $documentDto)
  {
    $documentDtoStored = $this->documentStoreAndShowUseCase->execute($documentDto);
    return Res::success($documentDtoStored, Response::HTTP_CREATED);
  }

  public function update(int $id, DocumentDto $documentDto)
  {
    $documentDtoUpdated = $this->documentUpdateAndShowUseCase->execute($id, $documentDto);
    return Res::success($documentDtoUpdated);
  }
}
