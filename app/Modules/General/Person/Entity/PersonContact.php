<?php

namespace App\Modules\General\Person\Entity;

final class PersonContact
{
  public function __construct(
    public ?string $id,
    public ?string $person_id,
    public string $name,
    public ?string $cnpj,
    public ?string $type,
    public ?string $note,
    public ?string $phone,
    public ?string $email,
  ){}
}