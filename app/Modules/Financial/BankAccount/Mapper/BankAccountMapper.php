<?php

namespace App\Modules\Financial\BankAccount\Mapper;

use App\Modules\Financial\Bank\Mapper\BankMapper;
use App\Modules\Financial\BankAccount\Dto\BankAccountDto;
use App\Modules\Financial\BankAccount\Entity\BankAccount;

class BankAccountMapper
{
  public static function mapDtoToEntity(BankAccountDto $bankAccountDto): BankAccount 
  {
    // BankAccount
    $data = $bankAccountDto->toArray();
    $data['bank'] = (isset($data['bank']) && $data['bank']) ? BankMapper::mapArrayToEntity($data['bank']) : null;
    $bankAccount = new BankAccount(...$data);
    
    return $bankAccount;
  }  

  public static function mapArrayToEntity(array $data): BankAccount
  {
    // BankAccount
    $data['bank'] = (isset($data['bank']) && $data['bank']) ? BankMapper::mapArrayToEntity($data['bank']) : null;
    $bankAccount = new BankAccount(...$data);
    
    return $bankAccount;
  }

  public static function mapEntityToDto(BankAccount $bankAccountEntity): BankAccountDto 
  {
    return BankAccountDto::from(objectToArray($bankAccountEntity));
  }
}