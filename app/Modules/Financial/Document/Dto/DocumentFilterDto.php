<?php

namespace App\Modules\Financial\Document\Dto;

use App\Shared\Dto\BaseFilterDto;
use Spatie\LaravelData\Attributes\Validation\Rule;

class DocumentFilterDto extends BaseFilterDto
{
  public static function authorize(): bool
  {
    return true;
  }  

  /**
   * @param array|null $custom_search (array of string)
   */
  public function __construct(
    #[Rule('nullable|array')]
    public ?array $custom_search,
  ){
    parent::__construct(...self::init());
  }
}
