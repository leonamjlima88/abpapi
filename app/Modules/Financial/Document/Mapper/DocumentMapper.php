<?php

namespace App\Modules\Financial\Document\Mapper;

use App\Modules\Financial\Document\Dto\DocumentDto;
use App\Modules\Financial\Document\Entity\Document;
use Illuminate\Support\Arr;

class DocumentMapper
{
  public static function mapDtoToEntity(DocumentDto $documentDto): Document 
  {
    return new Document(...$documentDto->toArray());
  }  

  public static function mapArrayToEntity(array $data): Document
  {
    return new Document(...$data);
  }  

  public static function mapEntityToDto(Document $documentEntity): DocumentDto 
  {
    return DocumentDto::from(objectToArray($documentEntity));
  }  
}