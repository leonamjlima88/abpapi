<?php

namespace App\Modules\General\Person\Repository\Enum;

use App\Shared\Trait\EnumTrait;

enum PersonAddressTypeEnum: int
{
  use EnumTrait;
  
  case NO_TAG = 0;
  case DELIVERY = 1;
  case BILLING = 2;
}