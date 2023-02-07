<?php

namespace App\Modules\Stock\Product\Entity;

use App\Modules\Stock\Brand\Entity\Brand;
use App\Modules\Stock\Category\Entity\Category;
use App\Modules\Stock\Ncm\Entity\Ncm;
use App\Modules\Stock\Size\Entity\Size;
use App\Modules\Stock\StorageLocation\Entity\StorageLocation;
use App\Modules\Stock\Unit\Entity\Unit;
use App\Shared\Entity\BaseEntity;

class Product extends BaseEntity
{
  public function __construct(
    public ?int $id = 0,
    public string $name,
    public string $simplified_name,
    public int $type,
    public ?string $sku_code = '',
    public ?string $ean_code = '',
    public ?string $manufacturing_code = '',
    public ?string $identification_code = '',
    public ?float $cost = 0,
    public ?float $profit = 0,
    public ?float $price = 0,
    public ?float $current_quantity = 0,
    public ?float $minimum_quantity = 0,
    public ?float $maximum_quantity = 0,
    public ?float $gross_weight = 0,
    public ?float $net_weight = 0,
    public ?float $packing_weight = 0,
    public ?bool $is_to_move_the_stock = false,
    public ?bool $is_product_for_scales = false,
    public ?string $internal_note = '',
    public ?string $complement_note = '',
    public ?bool $is_discontinued = false,
    public int $unit_id,
    public int $ncm_id,
    public ?int $category_id = null,
    public ?int $brand_id = null,
    public ?int $size_id = null,
    public ?int $storage_location_id = null,
    public ?int $genre = null,
    public ?string $created_at = null,
    public ?string $updated_at = null,
    public ?int $created_by_user_id = null,
    public ?int $updated_by_user_id = null,
    public ?int $tenant_id = null,

    // Campo virtual
    public Unit|array|null $unit,

    // Campo virtual
    public Ncm|array|null $ncm,

    // Campo virtual
    public Category|array|null $category,

    // Campo virtual
    public Brand|array|null $brand,

    // Campo virtual
    public Size|array|null $size,

    // Campo virtual
    public StorageLocation|array|null $storage_location,
  ){
  }
  
  public function validate(): void
  {
    // Efetuar validação se necessário...
  }
}
