<?php

namespace App\Modules\General\Person\Repository\Enum;

use App\Shared\Trait\EnumTrait;

enum PersonIcmsTaxPayerEnum: int
{
  use EnumTrait;
  
  case NO = 0;
  case YES = 1;
  case FREE = 2;
}