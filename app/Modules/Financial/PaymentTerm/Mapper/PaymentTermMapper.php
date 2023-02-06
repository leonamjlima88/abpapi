<?php

namespace App\Modules\Financial\PaymentTerm\Mapper;

use App\Modules\Financial\BankAccount\Mapper\BankAccountMapper;
use App\Modules\Financial\Document\Mapper\DocumentMapper;
use App\Modules\Financial\PaymentTerm\Dto\PaymentTermDto;
use App\Modules\Financial\PaymentTerm\Entity\PaymentTerm;

class PaymentTermMapper
{
  public static function mapDtoToEntity(PaymentTermDto $bankAccountDto): PaymentTerm 
  {
    // PaymentTerm
    $data = $bankAccountDto->toArray();
    (isset($data['bank_account']) && $data['bank_account']) ? BankAccountMapper::mapArrayToEntity($data['bank_account']) : null;
    $data['document'] = (isset($data['document']) && $data['document']) ? DocumentMapper::mapArrayToEntity($data['document']) : null;
    $bankAccount = new PaymentTerm(...$data);
    
    return $bankAccount;
  }  

  public static function mapArrayToEntity(array $data): PaymentTerm
  {
    // PaymentTerm
    (isset($data['bank_account']) && $data['bank_account']) ? BankAccountMapper::mapArrayToEntity($data['bank_account']) : null;
    (isset($data['document']) && $data['document']) ? DocumentMapper::mapArrayToEntity($data['document']) : null;
    $bankAccount = new PaymentTerm(...$data);
    
    return $bankAccount;
  }

  public static function mapEntityToDto(PaymentTerm $bankAccountEntity): PaymentTermDto 
  {
    return PaymentTermDto::from(objectToArray($bankAccountEntity));
  }
}