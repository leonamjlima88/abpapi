<?php

namespace App\Modules\Fiscal\Cfop\Repository\Enum;

use App\Shared\Trait\EnumTrait;

enum CfopOperationTypeEnum: int
{
  use EnumTrait;
  
  case IN = 0;
  case OUT = 1;
}