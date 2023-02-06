<?php

namespace App\Modules\Fiscal\OperationType\Repository\Enum;

use App\Shared\Trait\EnumTrait;

enum OperationTypeIssuePurposeEnum: int
{
  use EnumTrait;
  
  case NORMAL = 0;
  case COMPLEMENTARY = 1;
  case ADJUSTMENT = 2;
  case DEVOLUTION = 3;
}