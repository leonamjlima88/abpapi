<?php

namespace App\Modules\Fiscal\OperationType\Repository\Enum;

use App\Shared\Trait\EnumTrait;

enum OperationTypeDocumentTypeEnum: int
{
  use EnumTrait;
  
  case IN = 0;
  case OUT = 1;
}