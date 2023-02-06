<?php

namespace App\Modules\General\Person\Mapper;

use App\Modules\General\City\Mapper\CityMapper;
use App\Modules\General\Person\Dto\PersonDto;
use App\Modules\General\Person\Entity\Person;
use App\Modules\General\Person\Entity\PersonAddress;
use App\Modules\General\Person\Entity\PersonContact;

class PersonMapper
{
  public static function mapDtoToEntity(PersonDto $personDto): Person 
  {
    // Person
    $data = $personDto->toArray();
    $data['city'] = (isset($data['city']) && $data['city']) ? CityMapper::mapArrayToEntity($data['city']) : null;
    $person = new Person(...$data);
    
    // PersonContact
    $person->person_contact = [];
    foreach ($personDto->person_contact ?? [] as $personContactDto) {
      $person->person_contact[] = new PersonContact(...$personContactDto->toArray());      
    }

    // PersonAddress
    $person->person_address = [];
    foreach ($personDto->person_address ?? [] as $personAddressDto) {
      $person->person_address[] = new PersonAddress(...$personAddressDto->toArray());      
    }

    return $person;
  }  

  public static function mapArrayToEntity(array $data): Person
  {
    // Person
    $data['city'] = (isset($data['city']) && $data['city']) ? CityMapper::mapArrayToEntity($data['city']) : null;
    $person = new Person(...$data);
    
    // PersonContact
    $person->person_contact = [];
    foreach ($data['person_contact'] ?? [] as $personContact) {
      $person->person_contact[] = new PersonContact(...$personContact);      
    }

    // PersonAddress
    $person->person_address = [];
    foreach ($data['person_address'] ?? [] as $personAddress) {
      $personAddress['city'] = (isset($personAddress['city']) && $personAddress['city']) ? CityMapper::mapArrayToEntity($personAddress['city']) : null;
      $person->person_address[] = new PersonAddress(...$personAddress);      
    }

    return $person;
  }

  public static function mapEntityToDto(Person $personEntity): PersonDto 
  {
    return PersonDto::from(objectToArray($personEntity));
  }
}