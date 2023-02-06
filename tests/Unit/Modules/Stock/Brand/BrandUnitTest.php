<?php

namespace Tests\Unit\Modules\Stock\Brand;

use App\Modules\Stock\Brand\Entity\Brand;
use App\Modules\Stock\Brand\Repository\Memory\BrandRepositoryMemory;
use Tests\Unit\Shared\BaseUnitTest;

class BrandUnitTest extends BaseUnitTest
{
  public function testStoreBrand()
  {
    // Arrange (Preparar)
    $brandRepository = new BrandRepositoryMemory();

    // Act (Executar)
    $brandEntity = new Brand(
      id: 0,
      name: $this->faker->name,
      created_at: $this->faker->dateTime->format('Y-m-d H:m:s'),
      updated_at: '',
      created_by_user_id: $this->faker->numberBetween(1, 5),
      updated_by_user_id: 0,
    );
    $idStored = $brandRepository->store($brandEntity);
    $arrayStored = (array) $brandEntity;

    // Asset (Validar test)
    $arrayFound = (array) $brandRepository->show($idStored);
    $this->assertEquals($arrayFound, $arrayStored);
  }
}
